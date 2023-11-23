<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Services\Load;

use App\DTO\LoadDataDTO;
use App\Repository\ProductRepository;

class LoadDataService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getData(string $sku): LoadDataDTO
    {
        $data = $this->productRepository->getData($sku);

        return new LoadDataDTO(
            $data[0]['name'],
            $data[0]['ean'],
            $data[0]['producerName'],
            $data[0]['category'],
            $data[0]['defaultImage'],
            $data[0]['quantity'],
            $data[0]['unit'],
            $data[0]['shippingCost'],
            $data[0]['priceNetAfterDiscount'],
        );
    }
}