<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Transformator;

use App\DTO\ProductDTO;

class ProductTransformator
{
    public function getDataTransformObject(array $row): ProductDTO
    {
        return new ProductDTO(
            $row['ID'],
            $row['SKU'],
            $row['name'],
            $row['reference_number'],
            $row['EAN'],
            $row['can_be_returned'],
            $row['producer_name'],
            $row['category'],
            $row['is_wire'],
            $row['shipping'],
            $row['package_size'],
            $row['available'],
            $row['logistic_height'],
            $row['logistic_width'],
            $row['logistic_length'],
            $row['logistic_weight'],
            $row['is_vendor'],
            $row['available_in_parcel_locker'],
            $row['default_image']
        );
    }
}