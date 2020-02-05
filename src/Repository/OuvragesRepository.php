<?php

namespace App\Repository;

use App\Entity\Ouvrages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ouvrages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ouvrages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ouvrages[]    findAll()
 * @method Ouvrages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OuvragesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ouvrages::class);
    }

    // /**
    //  * @return Ouvrages[] Returns an array of Ouvrages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ouvrages
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
