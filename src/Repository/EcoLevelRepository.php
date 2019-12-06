<?php

namespace App\Repository;

use App\Entity\EcoLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EcoLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method EcoLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method EcoLevel[]    findAll()
 * @method EcoLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcoLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EcoLevel::class);
    }

    // /**
    //  * @return EcoLevel[] Returns an array of EcoLevel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EcoLevel
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
