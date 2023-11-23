<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Command\Price;

use App\Services\Import\PriceImportService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ImportPriceHandler
{
    public PriceImportService $priceService;

    public function __construct(PriceImportService $priceService)
    {
        $this->priceService = $priceService;
    }

    public function __invoke(ImportPrice $command): void
    {
        $this->priceService->importPrice($command->getInput(), $command->getOutput());
    }
}