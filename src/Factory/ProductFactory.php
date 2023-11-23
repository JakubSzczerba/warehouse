<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Factory;

use App\DTO\ProductDTO;
use App\Entity\Product;

class ProductFactory
{
    public function create(ProductDTO $productDTO): Product
    {
        $product = new Product();
        $product
            ->setProductId($productDTO->getProductId())
            ->setSku($productDTO->getSku())
            ->setName($productDTO->getName())
            ->setReferenceNumber($productDTO->getReferenceNumber())
            ->setEan($productDTO->getEan())
            ->setCanBeReturned($productDTO->isCanBeReturned())
            ->setProducerName($productDTO->getProducerName())
            ->setCategory($productDTO->getCategory())
            ->setIsWire($productDTO->isWire())
            ->setShipping($productDTO->getShipping())
            ->setPackageSize($productDTO->getPackageSize())
            ->setAvailable($productDTO->getAvailable())
            ->setLogisticHeight($productDTO->getLogisticHeight())
            ->setLogisticWidth($productDTO->getLogisticWidth())
            ->setLogisticLength($productDTO->getLogisticLength())
            ->setLogisticWeight($productDTO->getLogisticWeight())
            ->setIsVendor($productDTO->isVendor())
            ->setAvailableInParcelLocker($productDTO->isAvailableInParcelLocker());

        return $product;
    }
}