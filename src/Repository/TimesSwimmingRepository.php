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
}
