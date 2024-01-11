<?php

namespace App\Repository;

use App\Entity\TimesLongjump;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TimesLongjump>
 *
 * @method TimesLongjump|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimesLongjump|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimesLongjump[]    findAll()
 * @method TimesLongjump[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimesLongjumpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TimesLongjump::class);
    }

//    /**
//     * @return TimesLongjump[] Returns an array of TimesLongjump objects
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

//    public function findOneBySomeField($value): ?TimesLongjump
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
