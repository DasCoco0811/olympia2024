<?php

namespace App\Repository;

use App\Entity\Athletes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Athletes>
 *
 * @method Athletes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Athletes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Athletes[]    findAll()
 * @method Athletes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AthletesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Athletes::class);
    }

    public function getApiAllAthletes(): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM athletes a
            INNER JOIN countries c ON a.countries_id = c.id
        ';

        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiAllFemaleAthletes(): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM athletes a 
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.sex = "f"
        ';

        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiAllMaleAthletes(): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM athletes a
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.sex = "m"
        ';

        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByIdAthlete($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM athletes a
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.id = ?
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }
}
