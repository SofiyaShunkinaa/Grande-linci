<?php

namespace App\Repository;

use App\Entity\Kitten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Kitten>
 */
class KittenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kitten::class);
    }

       /**
        * @return Kitten[] 
        */
       public function find4ByLitter($value): array
       {
           return $this->createQueryBuilder('k')
               ->andWhere('k.litter = :litter')
               ->setParameter('litter', $value)
               ->orderBy('k.id', 'ASC')
               ->setMaxResults(4)
               ->getQuery()
               ->getResult()
           ;
       }

    //    public function findOneBySomeField($value): ?Kitten
    //    {
    //        return $this->createQueryBuilder('k')
    //            ->andWhere('k.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
