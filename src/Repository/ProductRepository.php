<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function getData(string $sku): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p.name', 'p.ean', 'p.producerName', 'p.category', 'p.defaultImage', 'i.quantity', 'i.unit', 'i.shippingCost', 'pr.priceNetAfterDiscount')
            ->leftJoin('App\Entity\Inventory', 'i', 'WITH', 'p.sku = i.sku')
            ->leftJoin('App\Entity\Price', 'pr', 'WITH', 'p.sku = pr.sku')
            ->where('p.sku = :sku')
            ->setParameter('sku', $sku)
            ->getQuery();


        return $qb->getResult();
    }
}
