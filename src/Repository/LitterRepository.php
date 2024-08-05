<?php

namespace App\Repository;

use App\Entity\Litter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Litter>
 */
class LitterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Litter::class);
    }

    public function findOneByIsActive(): ?Litter
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.isActive = :isActive')
            ->setParameter('isActive', true)
            ->orderBy('l.id', 'DESC')
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

//    /**
//     * @return Litter[] Returns an array of Litter objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

}
