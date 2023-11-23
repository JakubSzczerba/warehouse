<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\DTO;

class LoadDataDTO
{
    private string $name;

    private string $ean;

    private string $producerName;

    private string $category;

    private ?string $defaultImage;

    private string $quantity;

    private string $unit;

    private string $shippingCost;

    private string $priceNetAfterDiscount;

    public function __construct(
        string $name,
        string $ean,
        string $producerName,
        string $category,
        ?string $defaultImage,
        string $quantity,
        string $unit,
        string $shippingCost,
        string $priceNetAfterDiscount
    ) {
        $this->name = $name;
        $this->ean = $ean;
        $this->producerName = $producerName;
        $this->category = $category;
        $this->defaultImage = $defaultImage;
        $this->quantity = $quantity;
        $this->unit = $unit;
        $this->shippingCost = $shippingCost;
        $this->priceNetAfterDiscount = $priceNetAfterDiscount;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'ean' => $this->ean,
            'producerName' => $this->producerName,
            'category' => $this->category,
            'defaultImage' => $this->defaultImage,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'shippingCost' => $this->shippingCost,
            'priceNetAfterDiscount' => $this->priceNetAfterDiscount
        ];
    }
}