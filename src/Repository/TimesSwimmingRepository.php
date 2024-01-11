<?php

namespace App\Repository;

use App\Entity\TimesSwimming;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TimesSwimming>
 *
 * @method TimesSwimming|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimesSwimming|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimesSwimming[]    findAll()
 * @method TimesSwimming[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimesSwimmingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TimesSwimming::class);
    }

//    /**
//     * @return TimesSwimming[] Returns an array of TimesSwimming objects
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

//    public function findOneBySomeField($value): ?TimesSwimming
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
