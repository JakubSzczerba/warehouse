<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Price;

class PriceFactory
{
    private const PRICE_ID = 0;

    private const SKU = 1;

    private const PRICE = 5;

    public function create(array $data): Price
    {
        $price = new Price();

        $price
            ->setPriceId($data[self::PRICE_ID])
            ->setSku($data[self::SKU])
            ->setPriceNetAfterDiscount($data[self::PRICE]);

        return $price;
    }
}