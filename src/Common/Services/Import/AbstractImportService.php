<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Common\Services\Import;

use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Exception;
use League\Csv\InvalidArgument;
use League\Csv\Reader;
use League\Csv\UnavailableStream;
use Symfony\Component\Filesystem\Filesystem;

abstract class AbstractImportService
{
    private const BATCH = 100;

    private const ITERATION_START = 0;

    protected EntityManagerInterface $entityManager;

    protected string $directory;

    protected string $delimiter;

    public function __construct(EntityManagerInterface $entityManager, string $directory, string $delimiter)
    {
        $this->entityManager = $entityManager;
        $this->directory = $directory;
        $this->delimiter = $delimiter;
    }

    abstract protected function createEntity(array $data): ?object;

    /**
     * @throws UnavailableStream
     * @throws InvalidArgument
     * @throws Exception
     */
    public function import(string $input, string $output, bool $hasHeader = true): void
    {
        /* Save file */
        $dateTime = (new \DateTimeImmutable('now'))->format('Yd-m-Y-H-i-s');
        $localPath = $output . $this->directory . $dateTime . '.csv';
        $filesystem = new Filesystem();
        $filesystem->copy($input, $localPath);

        /* Read file */
        $reader = Reader::createFromPath($localPath);
        $reader->setDelimiter($this->delimiter);
        if ($hasHeader) {
            $reader->setHeaderOffset(0);
        }

        $data = $reader->getRecords();

        /* Iteration for transforming and persisting data to db */
        $iterationCount = self::ITERATION_START;
        foreach ($data as $row) {
            $entity = $this->createEntity($row);
            if ($entity) {
                $this->entityManager->persist($entity);
            }

            if ((++$iterationCount % self::BATCH) === 0) {
                $this->entityManager->flush();
                $this->entityManager->clear();
            }
        }
    }
}