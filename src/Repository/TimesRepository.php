<?php

namespace App\Repository;

use App\Entity\Times;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Times>
 *
 * @method Times|null find($id, $lockMode = null, $lockVersion = null)
 * @method Times|null findOneBy(array $criteria, array $orderBy = null)
 * @method Times[]    findAll()
 * @method Times[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Times::class);
    }

    public function getApiAllTimes(): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
        ';

        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiAllFTimes(): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.sex = "f"
        ';

        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiAllMTimes(): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.sex = "m"
        ';

        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByIdTimes($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE t.id = ?
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByAthleteIdTimes($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.id = ?
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiBySportIdTimes($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = ?
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByMSportIdTimes($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = ? and a.sex = "m"
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiFBySportIdTimes($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = ? and a.sex = "f"
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByWinnerMSportIdTimes($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = ? and a.sex = "m"
            ORDER BY t.time ASC
            LIMIT 3
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByWinnerFSportIdTimes($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = ? and a.sex = "f"
            ORDER BY t.time ASC
            LIMIT 3
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByTopThreeTimes(): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql1 = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = 1
            ORDER BY t.time ASC
            LIMIT 3
        ';
        $stmt1 = $connection->prepare($sql1);
        $resultSet1 = $stmt1->executeQuery();

        $sql2 = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = 2
            ORDER BY t.time ASC
            LIMIT 3
        ';
        $stmt2 = $connection->prepare($sql2);
        $resultSet2 = $stmt2->executeQuery();

        $sql3 = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = 3
            ORDER BY t.time ASC
            LIMIT 3
        ';
        $stmt3 = $connection->prepare($sql3);
        $resultSet3 = $stmt3->executeQuery();

        $sql4 = '
            SELECT *
            FROM times t
            INNER JOIN athletes a ON t.athletes_id = a.id
            INNER JOIN sports s ON t.sports_id = s.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE s.id = 4
            ORDER BY t.time ASC
            LIMIT 3
        ';
        $stmt4 = $connection->prepare($sql4);
        $resultSet4 = $stmt4->executeQuery();

        $result = array(
            '1' => $resultSet1->fetchAllAssociative(),
            '2' => $resultSet2->fetchAllAssociative(),
            '3' => $resultSet3->fetchAllAssociative(),
            '4' => $resultSet4->fetchAllAssociative()
            );

        return $result;
    }
}
