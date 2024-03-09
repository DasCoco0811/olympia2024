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
}
