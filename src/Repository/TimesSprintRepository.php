<?php

namespace App\Repository;

use App\Entity\TimesSprint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TimesSprint>
 *
 * @method TimesSprint|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimesSprint|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimesSprint[]    findAll()
 * @method TimesSprint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimesSprintRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TimesSprint::class);
    }

//    /**
//     * @return TimesSprint[] Returns an array of TimesSprint objects
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

//    public function findOneBySomeField($value): ?TimesSprint
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
