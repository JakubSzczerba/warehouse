<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $productId;

    #[ORM\Column(length: 255)]
    private string $sku;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $referenceNumber;

    #[ORM\Column(length: 255)]
    private string $ean;

    #[ORM\Column]
    private bool $canBeReturned;

    #[ORM\Column(length: 255)]
    private string $producerName;

    #[ORM\Column(length: 1000)]
    private string $category;
    #[ORM\Column]
    private bool $isWire;

    #[ORM\Column(length: 255)]
    private string $shipping;

    #[ORM\Column(length: 255)]
    private string $packageSize;

    #[ORM\Column(length: 255)]
    private string $available;

    #[ORM\Column(length: 255)]
    private string $logisticHeight;

    #[ORM\Column(length: 255)]
    private string $logisticWidth;

    #[ORM\Column(length: 255)]
    private string $logisticLength;

    #[ORM\Column(length: 255)]
    private string $logisticWeight;

    #[ORM\Column]
    private bool $isVendor;

    #[ORM\Column]
    private bool $availableInParcelLocker;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $defaultImage;

    public function getId(): int
    {
        return $this->id;
    }

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function setProductId(string $productId): static
    {
        $this->productId = $productId;

        return $this;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): static
    {
        $this->sku = $sku;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getReferenceNumber(): string
    {
        return $this->referenceNumber;
    }

    public function setReferenceNumber(string $referenceNumber): static
    {
        $this->referenceNumber = $referenceNumber;

        return $this;
    }

    public function getEan(): string
    {
        return $this->ean;
    }

    public function setEan(string $ean): static
    {
        $this->ean = $ean;

        return $this;
    }

    public function isCanBeReturned(): bool
    {
        return $this->canBeReturned;
    }

    public function setCanBeReturned(bool $canBeReturned): static
    {
        $this->canBeReturned = $canBeReturned;

        return $this;
    }

    public function getProducerName(): string
    {
        return $this->producerName;
    }

    public function setProducerName(string $producerName): static
    {
        $this->producerName = $producerName;

        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function isIsWire(): bool
    {
        return $this->isWire;
    }

    public function setIsWire(bool $isWire): static
    {
        $this->isWire = $isWire;

        return $this;
    }

    public function getShipping(): string
    {
        return $this->shipping;
    }

    public function setShipping(string $shipping): static
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getPackageSize(): string
    {
        return $this->packageSize;
    }

    public function setPackageSize(string $packageSize): static
    {
        $this->packageSize = $packageSize;

        return $this;
    }

    public function getAvailable(): string
    {
        return $this->available;
    }

    public function setAvailable(string $available): static
    {
        $this->available = $available;

        return $this;
    }

    public function getLogisticHeight(): string
    {
        return $this->logisticHeight;
    }

    public function setLogisticHeight(string $logisticHeight): static
    {
        $this->logisticHeight = $logisticHeight;

        return $this;
    }

    public function getLogisticWidth(): string
    {
        return $this->logisticWidth;
    }

    public function setLogisticWidth(string $logisticWidth): static
    {
        $this->logisticWidth = $logisticWidth;

        return $this;
    }

    public function getLogisticLength(): string
    {
        return $this->logisticLength;
    }

    public function setLogisticLength(string $logisticLength): static
    {
        $this->logisticLength = $logisticLength;

        return $this;
    }

    public function getLogisticWeight(): string
    {
        return $this->logisticWeight;
    }

    public function setLogisticWeight(string $logisticWeight): static
    {
        $this->logisticWeight = $logisticWeight;

        return $this;
    }

    public function isIsVendor(): bool
    {
        return $this->isVendor;
    }

    public function setIsVendor(bool $isVendor): static
    {
        $this->isVendor = $isVendor;

        return $this;
    }

    public function isAvailableInParcelLocker(): bool
    {
        return $this->availableInParcelLocker;
    }

    public function setAvailableInParcelLocker(bool $availableInParcelLocker): static
    {
        $this->availableInParcelLocker = $availableInParcelLocker;

        return $this;
    }

    public function getDefaultImage(): ?string
    {
        return $this->defaultImage;
    }

    public function setDefaultImage(?string $defaultImage): static
    {
        $this->defaultImage = $defaultImage;

        return $this;
    }
}
