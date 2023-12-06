<?php

namespace App\Repository;

use App\Entity\Medals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Medals>
 *
 * @method Medals|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medals|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medals[]    findAll()
 * @method Medals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medals::class);
    }

    public function getApiAllMedals(): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM medals
        ';

        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByIdMedal($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM medals
            WHERE id = ?
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }
}
