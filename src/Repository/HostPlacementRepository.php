<?php

namespace App\Repository;

use App\Entity\HostPlacement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HostPlacement|null find($id, $lockMode = null, $lockVersion = null)
 * @method HostPlacement|null findOneBy(array $criteria, array $orderBy = null)
 * @method HostPlacement[]    findAll()
 * @method HostPlacement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HostPlacementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HostPlacement::class);
    }

    // /**
    //  * @return HostPlacement[] Returns an array of HostPlacement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HostPlacement
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
