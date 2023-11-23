<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Services\Import;

use App\Common\Services\Import\AbstractImportService;
use App\Entity\Inventory;
use App\Factory\InventoryFactory;
use Doctrine\ORM\EntityManagerInterface;

final class InventoryImportService extends AbstractImportService
{
    private const DIRECTORY = 'inventories/';

    private const DELIMITER = ',';

    private const SHIPPING = '24h';

    private InventoryFactory $factory;

    public function __construct(
        InventoryFactory $factory,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager, self::DIRECTORY, self::DELIMITER);
        $this->factory = $factory;
    }

    protected function createEntity(array $data): ?Inventory
    {
        if ($data['shipping'] === self::SHIPPING) {
            return $this->factory->create($data);
        }

        return null;
    }

    public function importInventory(string $input, string $output): void
    {
        $this->import($input, $output);
    }
}