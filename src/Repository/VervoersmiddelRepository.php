<?php

namespace App\Repository;

use App\Entity\Vervoersmiddel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vervoersmiddel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vervoersmiddel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vervoersmiddel[]    findAll()
 * @method Vervoersmiddel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VervoersmiddelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vervoersmiddel::class);
    }

    // /**
    //  * @return Vervoersmiddel[] Returns an array of Vervoersmiddel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vervoersmiddel
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
