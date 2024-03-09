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
}
