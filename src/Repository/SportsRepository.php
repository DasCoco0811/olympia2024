<?php

namespace App\Repository;

use App\Entity\Sports;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sports>
 *
 * @method Sports|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sports|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sports[]    findAll()
 * @method Sports[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sports::class);
    }

    public function getApiAllSports(): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM sports
        ';

        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByIdSport($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM sports
            WHERE id = ?
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByDetailId($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql1 = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = ? and a.sex = "f"
            ORDER BY t.time ASC
            LIMIT 1
        ';
        $stmt1 = $connection->prepare($sql1);
        $stmt1->bindValue(1, $id);
        $resultSet1 = $stmt1->executeQuery();

        $sql2 = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = ? and a.sex = "m"
            ORDER BY t.time ASC
            LIMIT 1
        ';
        $stmt2 = $connection->prepare($sql2);
        $stmt2->bindValue(1, $id);
        $resultSet2 = $stmt2->executeQuery();

        $sql3 = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = ?
            ORDER BY t.time ASC
            LIMIT 1
        ';
        $stmt3 = $connection->prepare($sql3);
        $stmt3->bindValue(1, $id);
        $resultSet3 = $stmt3->executeQuery();

        $sql4 = '
            SELECT description
            FROM sports
        ';
        $stmt4 = $connection->prepare($sql4);
        $resultSet4 = $stmt4->executeQuery();

        $result = array(
            'female' => $resultSet1->fetchAllAssociative(),
            'male' => $resultSet2->fetchAllAssociative(),
            'record' => $resultSet3->fetchAllAssociative(),
            'description' => $resultSet4->fetchAllAssociative(),
        );

        return $result;
    }
}
