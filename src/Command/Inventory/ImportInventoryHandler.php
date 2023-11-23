<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Command\Inventory;

use App\Services\Import\InventoryImportService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ImportInventoryHandler
{
    public InventoryImportService $inventoryService;

    public function __construct(InventoryImportService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    public function __invoke(ImportInventory $command): void
    {
        $this->inventoryService->importInventory($command->getInput(), $command->getOutput());
    }
}