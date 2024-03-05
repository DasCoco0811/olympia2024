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
            SELECT
                a.id,
                a.first_name,
                a.last_name,
                a.description,
                a.birthdate,
                a.sex,
                c.id as country_id,
                c.name as country_name,
                c.iso_2 as country_iso2,
                c.iso_3 as country_iso3
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
