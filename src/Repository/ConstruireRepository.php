<?php

namespace App\Repository;

use App\Entity\Construire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Construire>
 *
 * @method Construire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Construire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Construire[]    findAll()
 * @method Construire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConstruireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Construire::class);
    }

//    /**
//     * @return Construire[] Returns an array of Construire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Construire
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
