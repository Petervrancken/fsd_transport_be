<?php

namespace App\Repository;

use App\Entity\Verplaatsing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Verplaatsing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Verplaatsing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Verplaatsing[]    findAll()
 * @method Verplaatsing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VerplaatsingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Verplaatsing::class);
    }

    // /**
    //  * @return Verplaatsing[] Returns an array of Verplaatsing objects
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
    public function findOneBySomeField($value): ?Verplaatsing
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
