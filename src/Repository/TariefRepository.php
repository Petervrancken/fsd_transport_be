<?php

namespace App\Repository;

use App\Entity\Tarief;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tarief|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tarief|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tarief[]    findAll()
 * @method Tarief[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TariefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tarief::class);
    }

    // /**
    //  * @return Tarief[] Returns an array of Tarief objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tarief
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
