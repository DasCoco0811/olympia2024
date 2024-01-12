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

    //name: sports_detail
    public function getApiByDetailId($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        if ($id === '1'){
            $table = 'times_sprint';
            $result = $this->time($connection, $table);
        }elseif ($id === '2'){
            $table = 'times_swimming';
            $result = $this->time($connection, $table);
        }elseif ($id === '3'){
            $table = 'times_showjumping';
            $result = $this->time($connection, $table);
        }elseif ($id === '4'){
            $result = $this->distance($connection);
        }else {
            //error are 4 ur mom
            return array('your' => 'mom');
        }

        return $result;
    }

    private function time($connection, $table): array
    {
        $sql1 = '
            SELECT *
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.sex = "f"
            ORDER BY t.time ASC
            LIMIT 1
        ';

        $stmt1 = $connection->prepare($sql1);
        $resultSet1 = $stmt1->executeQuery();

        $sql2 = '
            SELECT *
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.sex = "m"
            ORDER BY t.time ASC
            LIMIT 1
        ';
        $stmt2 = $connection->prepare($sql2);
        $resultSet2 = $stmt2->executeQuery();

        $sql3 = '
            SELECT *
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            ORDER BY t.time ASC
            LIMIT 1
        ';
        $stmt3 = $connection->prepare($sql3);
        $resultSet3 = $stmt3->executeQuery();

        $result = array(
            'female' => $resultSet1->fetchAllAssociative(),
            'male' => $resultSet2->fetchAllAssociative(),
            'record' => $resultSet3->fetchAllAssociative(),
        );

        return $result;
    }

    private function distance($connection): array
    {
        $sql1 = '
            SELECT *
            FROM times_longjump t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.sex = "f"
            ORDER BY t.distance ASC
            LIMIT 1
        ';
        $stmt1 = $connection->prepare($sql1);
        $resultSet1 = $stmt1->executeQuery();

        $sql2 = '
            SELECT *
            FROM times_longjump t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.sex = "m"
            ORDER BY t.distance ASC
            LIMIT 1
        ';
        $stmt2 = $connection->prepare($sql2);
        $resultSet2 = $stmt2->executeQuery();

        $sql3 = '
            SELECT *
            FROM times_longjump t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            ORDER BY t.distance ASC
            LIMIT 1
        ';
        $stmt3 = $connection->prepare($sql3);
        $resultSet3 = $stmt3->executeQuery();

        $result = array(
            'female' => $resultSet1->fetchAllAssociative(),
            'male' => $resultSet2->fetchAllAssociative(),
            'record' => $resultSet3->fetchAllAssociative(),
        );

        return $result;
    }
}
