<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Services\Import;

use App\Common\Services\Import\AbstractImportService;
use App\Entity\Product;
use App\Factory\ProductFactory;
use App\Transformator\ProductTransformator;
use Doctrine\ORM\EntityManagerInterface;

final class ProductImportService extends AbstractImportService
{
    private const DIRECTORY = 'products/';

    private const DELIMITER = ';';

    private const NOT_WIRE = '0';

    private const SHIPPING = '24h';

    private ProductTransformator $transformator;

    private ProductFactory $factory;

    public function __construct(
        ProductTransformator $transformator,
        ProductFactory $factory,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager, self::DIRECTORY, self::DELIMITER);
        $this->transformator = $transformator;
        $this->factory = $factory;
    }

    protected function createEntity(array $data): ?Product
    {
        if ($data['is_wire'] === self::NOT_WIRE && $data['shipping'] === self::SHIPPING) {
            return $this->factory->create($this->transformator->getDataTransformObject($data));
        }

        return null;
    }

    public function importProduct(string $input, string $output): void
    {
        $this->import($input, $output);
    }
}