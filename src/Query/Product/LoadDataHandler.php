<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Query\Product;

use App\Services\Load\LoadDataService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class LoadDataHandler
{
    public LoadDataService $service;

    public function __construct(LoadDataService $service)
    {
        $this->service = $service;
    }

    public function __invoke(LoadData $query): array
    {
        $data = $this->service->getData($query->getSku());

        return $data->jsonSerialize();
    }
}