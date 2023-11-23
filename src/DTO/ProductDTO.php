<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\DTO;

class ProductDTO
{
    private string $productId;

    private string $sku;

    private string $name;

    private string $referenceNumber;

    private string $ean;

    private bool $canBeReturned;

    private string $producerName;

    private string $category;

    private bool $isWire;

    private string $shipping;

    private string $packageSize;

    private string $available;

    private string $logisticHeight;

    private string $logisticWidth;

    private string $logisticLength;

    private string $logisticWeight;

    private bool $isVendor;

    private bool $availableInParcelLocker;

    private ?string $defaultImage;

    public function __construct(
        string      $productId,
        string      $sku,
        string      $name,
        string      $referenceNumber,
        string      $ean,
        string      $canBeReturned,
        string      $producerName,
        string      $category,
        string      $isWire,
        string      $shipping,
        string      $packageSize,
        string      $available,
        string      $logisticHeight,
        string      $logisticWidth,
        string      $logisticLength,
        string      $logisticWeight,
        string      $isVendor,
        string      $availableInParcelLocker,
        null|string $defaultImage
    ) {
        $this->productId = $productId;
        $this->sku = $sku;
        $this->name = $name;
        $this->referenceNumber = $referenceNumber;
        $this->ean = $ean;
        $this->canBeReturned = (bool)$canBeReturned;
        $this->producerName = $producerName;
        $this->category = $category;
        $this->isWire = (bool)$isWire;
        $this->shipping = $shipping;
        $this->packageSize = $packageSize;
        $this->available = $available;
        $this->logisticHeight = $logisticHeight;
        $this->logisticWidth = $logisticWidth;
        $this->logisticLength = $logisticLength;
        $this->logisticWeight = $logisticWeight;
        $this->isVendor = (bool)$isVendor;
        $this->availableInParcelLocker = (bool)$availableInParcelLocker;
        $this->defaultImage = $defaultImage;
    }

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getReferenceNumber(): string
    {
        return $this->referenceNumber;
    }

    public function getEan(): string
    {
        return $this->ean;
    }

    public function isCanBeReturned(): bool
    {
        return $this->canBeReturned;
    }

    public function getProducerName(): string
    {
        return $this->producerName;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function isWire(): bool
    {
        return $this->isWire;
    }

    public function getShipping(): string
    {
        return $this->shipping;
    }

    public function getPackageSize(): string
    {
        return $this->packageSize;
    }

    public function getAvailable(): string
    {
        return $this->available;
    }

    public function getLogisticHeight(): string
    {
        return $this->logisticHeight;
    }

    public function getLogisticWidth(): string
    {
        return $this->logisticWidth;
    }

    public function getLogisticLength(): string
    {
        return $this->logisticLength;
    }

    public function getLogisticWeight(): string
    {
        return $this->logisticWeight;
    }

    public function isVendor(): bool
    {
        return $this->isVendor;
    }

    public function isAvailableInParcelLocker(): bool
    {
        return $this->availableInParcelLocker;
    }

    public function getDefaultImage(): ?string
    {
        return $this->defaultImage;
    }
}