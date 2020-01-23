<?php

namespace App\Repository;

use App\Entity\Kok;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Kok|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kok|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kok[]    findAll()
 * @method Kok[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KokRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kok::class);
    }

    // /**
    //  * @return Kok[] Returns an array of Kok objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kok
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
