<?php

namespace App\Repository;

use App\Entity\HostPlace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HostPlace|null find($id, $lockMode = null, $lockVersion = null)
 * @method HostPlace|null findOneBy(array $criteria, array $orderBy = null)
 * @method HostPlace[]    findAll()
 * @method HostPlace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HostPlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HostPlace::class);
    }

    // /**
    //  * @return HostPlace[] Returns an array of HostPlace objects
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
    public function findOneBySomeField($value): ?HostPlace
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
