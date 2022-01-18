<?php

namespace App\Repository;

use App\Entity\OrderStates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderStates|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderStates|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderStates[]    findAll()
 * @method OrderStates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderStatesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderStates::class);
    }

    // /**
    //  * @return OrderStates[] Returns an array of OrderStates objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderStates
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
