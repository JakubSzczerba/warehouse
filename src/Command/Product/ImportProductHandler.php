<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Command\Product;

use App\Services\Import\ProductImportService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ImportProductHandler
{
    public ProductImportService $productService;

    public function __construct(ProductImportService $productService)
    {
        $this->productService = $productService;
    }

    public function __invoke(ImportProduct $command): void
    {
        $this->productService->importProduct($command->getInput(), $command->getOutput());
    }
}