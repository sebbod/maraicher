<?php

namespace App\Repository;

use App\Entity\Address;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Address|null find($id, $lockMode = null, $lockVersion = null)
 * @method Address|null findOneBy(array $criteria, array $orderBy = null)
 * @method Address[]    findAll()
 * @method Address[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Address::class);
    }

    // /**
    //  * @return Address[] Returns an array of Address objects
    //  */
    public function findBestSeries()
    {
        // en DQL
        /*
        $entityMng = $this->getEntityManager();
        $dql = "SELECT s 
                FROM App\Entity\Series s
                WHERE s.popularity > 100
                AND s.vote > 8
                ORDER BY s.popularity DESC";

        $q = $entityMng->createQuery($dql);
        */

        // en QueryBuilder
        /*
        $qryBuilder = $this->CreateQueryBuilder('s');
        $qryBuilder->andWhere('s.popularity > 100');
        $qryBuilder->andWhere('s.vote > 8');
        $qryBuilder->addOrderBy('s.popularity', 'DESC');
        $q = $qryBuilder->getQuery();
        */
        /* commun to up^^
        $q->setMaxResults(50);
        return $q->getResult();
*/
        // en QueryBuilder avec jointure
        $qryBuilder = $this->CreateQueryBuilder('adr');
        $qryBuilder->leftJoin('adr.users','adrs')
            ->addSelect('seas');
        $qryBuilder->andWhere('s.popularity > 100');
        $qryBuilder->andWhere('s.vote > 8');
        $qryBuilder->addOrderBy('s.popularity', 'DESC');

        $q = $qryBuilder->getQuery();

        $paginator = new Paginator($q);
        return $paginator;

/*
            return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
*/
    }



    public function findOneBySomeField($value): ?Address
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.zcode = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
