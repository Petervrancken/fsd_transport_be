<?php

namespace App\Repository;

use App\Entity\Veroersmiddel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Veroersmiddel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Veroersmiddel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Veroersmiddel[]    findAll()
 * @method Veroersmiddel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VeroersmiddelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Veroersmiddel::class);
    }

    // /**
    //  * @return Veroersmiddel[] Returns an array of Veroersmiddel objects
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
    public function findOneBySomeField($value): ?Veroersmiddel
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
