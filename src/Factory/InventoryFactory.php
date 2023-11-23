<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Inventory;

class InventoryFactory
{
    public function create(array $data): Inventory
    {
        $inventory = new Inventory();

        $inventory
            ->setProductId($data['product_id'])
            ->setSku($data['sku'])
            ->setUnit($data['unit'])
            ->setQuantity($data['qty'])
            ->setShippingCost($data['shipping_cost']);

        return $inventory;
    }
}