<?php

namespace App\Repository;

use App\Entity\TimesShowjumping;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TimesShowjumping>
 *
 * @method TimesShowjumping|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimesShowjumping|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimesShowjumping[]    findAll()
 * @method TimesShowjumping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimesShowjumpingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TimesShowjumping::class);
    }

//    /**
//     * @return TimesShowjumping[] Returns an array of TimesShowjumping objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TimesShowjumping
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
