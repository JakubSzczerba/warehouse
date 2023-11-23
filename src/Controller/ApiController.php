<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Controller;

use App\Command\Inventory\ImportInventory;
use App\Command\Price\ImportPrice;
use App\Command\Product\ImportProduct;
use App\Query\Product\LoadData;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Routing\Annotation\Route;

#[Route('api')]
class ApiController extends AbstractController
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    #[Route('/import', name: 'importData', methods: ['POST'])]
    public function importData(): JsonResponse
    {
        $output = $this->getParameter('local');

        try {
            $importProductCommand = new ImportProduct($this->getParameter('products'), $output);
            $this->messageBus->dispatch($importProductCommand);

            $importInventoryCommand = new ImportInventory($this->getParameter('inventory'), $output);
            $this->messageBus->dispatch($importInventoryCommand);

            $importPriceCommand = new ImportPrice($this->getParameter('prices'), $output);
            $this->messageBus->dispatch($importPriceCommand);

            return $this->json('Data has been imported');
        } catch (\Exception $e) {

            return $this->json(['error' => $e->getMessage()], 500);
        }
    }

    #[Route('/list', name: 'listData', methods: ['GET'])]
    public function getData(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if ($data === null) {
            return new JsonResponse(['error' => 'SKU required'], 400);
        }

        try {
            $query = new LoadData($data['sku']);
            $envelope =  $this->messageBus->dispatch($query);
            $handledStamp = $envelope->last(HandledStamp::class);

            return $this->json($handledStamp->getResult());
        } catch (\Exception $e) {

            return $this->json(['error' => $e->getMessage()], 500);
        }
    }
}
