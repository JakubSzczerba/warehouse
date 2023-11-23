<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Services\Import;

use App\Common\Services\Import\AbstractImportService;
use App\Entity\Price;
use App\Factory\PriceFactory;
use Doctrine\ORM\EntityManagerInterface;

final class PriceImportService extends AbstractImportService
{
    private const DIRECTORY = 'prices/';

    private const DELIMITER = ',';

    private  PriceFactory $factory;

    public function __construct(PriceFactory $factory, EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, self::DIRECTORY, self::DELIMITER);
        $this->factory = $factory;
    }

    protected function createEntity(array $data): ?Price
    {
        return $this->factory->create($data);
    }

    public function importPrice(string $input, string $output): void
    {
        $this->import($input, $output, false);
    }
}