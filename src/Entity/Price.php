<?php

namespace App\Entity;

use App\Repository\PriceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PriceRepository::class)]
class Price
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $priceId = null;

    #[ORM\Column(length: 255)]
    private ?string $sku = null;

    #[ORM\Column(length: 255)]
    private ?string $priceNetAfterDiscount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPriceId(): ?string
    {
        return $this->priceId;
    }

    public function setPriceId(string $priceId): static
    {
        $this->priceId = $priceId;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): static
    {
        $this->sku = $sku;

        return $this;
    }

    public function getPriceNetAfterDiscount(): ?string
    {
        return $this->priceNetAfterDiscount;
    }

    public function setPriceNetAfterDiscount(string $priceNetAfterDiscount): static
    {
        $this->priceNetAfterDiscount = $priceNetAfterDiscount;

        return $this;
    }
}
