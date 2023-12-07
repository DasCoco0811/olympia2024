<?php

namespace App\Repository;

use App\Entity\SprintMatchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SprintMatchData>
 *
 * @method SprintMatchData|null find($id, $lockMode = null, $lockVersion = null)
 * @method SprintMatchData|null findOneBy(array $criteria, array $orderBy = null)
 * @method SprintMatchData[]    findAll()
 * @method SprintMatchData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SprintMatchDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SprintMatchData::class);
    }

//    /**
//     * @return SprintMatchData[] Returns an array of SprintMatchData objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SprintMatchData
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
