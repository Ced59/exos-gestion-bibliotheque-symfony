<?php

namespace App\Repository;

use App\Entity\Bibliotheques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Bibliotheques|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliotheques|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliotheques[]    findAll()
 * @method Bibliotheques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliotheques::class);
    }

    // /**
    //  * @return Bibliotheques[] Returns an array of Bibliotheques objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bibliotheques
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
