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

    public function getApiSwimming()
    {
        $connection = $this->getEntityManager()->getConnection();

        $table = 'times_swimming';
        $row = 'time';

        $sql1 = '
            SELECT 
                t.id as id,
                a.id as athlete_id,
                t.'. $row .' as `'. $row .'`,
                t.disqualified as disqualified,
                a.sex as athlete_sex
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            ORDER BY t.'. $row .' ASC
        ';

        $stmt1 = $connection->prepare($sql1);
        $result = $stmt1->executeQuery()->fetchAllAssociative();

        return $result;
    }

    public function getApiSprint()
    {
        $connection = $this->getEntityManager()->getConnection();

        $table = 'times_sprint';
        $row = 'time';

        $sql1 = '
            SELECT 
                t.id as id,
                a.id as athlete_id,
                t.'. $row .' as `'. $row .'`,
                t.disqualified as disqualified,
                a.sex as athlete_sex
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            ORDER BY t.'. $row .' ASC
        ';

        $stmt1 = $connection->prepare($sql1);
        $result = $stmt1->executeQuery()->fetchAllAssociative();

        return $result;
    }

    public function getApiShowJumping()
    {
        $connection = $this->getEntityManager()->getConnection();

        $table = 'times_showjumping';
        $row = 'time';

        $sql1 = '
            SELECT 
                t.id as id,
                a.id as athlete_id,
                t.'. $row .' as `'. $row .'`,
                t.penalty as penalty,
                t.disqualified as disqualified,
                a.sex as athlete_sex
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            ORDER BY t.'. $row .' ASC
        ';

        $stmt1 = $connection->prepare($sql1);
        $result = $stmt1->executeQuery()->fetchAllAssociative();

        return $result;
    }

    public function getApiLongJump()
    {
        $connection = $this->getEntityManager()->getConnection();

        $table = 'times_longjump';
        $row = 'distance';

        $sql1 = '
            SELECT 
                t.id as id,
                a.id as athlete_id,
                t.'. $row .'1 as `'. $row .'1`,
                t.'. $row .'2 as `'. $row .'2`,
                t.'. $row .'3 as `'. $row .'3`,
                t.disqualified as disqualified,
                a.sex as athlete_sex
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            ORDER BY t.id ASC
        ';

        $stmt1 = $connection->prepare($sql1);
        $result = $stmt1->executeQuery()->fetchAllAssociative();

        return $result;
    }

    public function getApiBySportIdBest($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        if ($id === '1'){
            $table = 'times_sprint';
            $row = 'time';
        }elseif ($id === '2'){
            $table = 'times_swimming';
            $row = 'time';
        }elseif ($id === '3'){
            $table = 'times_showjumping';
            $row = 'time';
        }elseif ($id === '4'){
            $table = 'times_longjump';
            $row = 'distance';
        }else {
            //error are 4 ur mom
            return array('your' => 'mom');
        }

        $sql1 = '
            SELECT 
                t.id as id,
                a.id as athlete_id,
                c.id as countries_id,
                t.'. $row .' as `'. $row .'`,
                t.penalty as penalty,
                t.disqualified as disqualified,
                a.first_name as first_name,
                a.last_name as last_name,
                a.description as description,
                a.birthdate as birthdate,
                a.sex as sex,
                a.countries_id as countries_id,
                c.iso_2 as iso_2,
                c.iso_3 as iso_3,
                c.name as country_name
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.sex = "f"
            ORDER BY t.'. $row .' ASC
            LIMIT 1
        ';

//        die($sql1);

        $stmt1 = $connection->prepare($sql1);
        $resultSet1 = $stmt1->executeQuery();

        $sql2 = '
            SELECT  
                t.id as id,
                a.id as athlete_id,
                c.id as countries_id,
                t.'. $row .' as `'. $row .'`,
                t.penalty as penalty,
                t.disqualified as disqualified,
                a.first_name as first_name,
                a.last_name as last_name,
                a.description as description,
                a.birthdate as birthdate,
                a.sex as sex,
                a.countries_id as countries_id,
                c.iso_2 as iso_2,
                c.iso_3 as iso_3,
                c.name as country_name
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            WHERE a.sex = "m"
            ORDER BY t.'. $row .' ASC
            LIMIT 1
        ';
        $stmt2 = $connection->prepare($sql2);
        $resultSet2 = $stmt2->executeQuery();

        $sql3 = '
            SELECT  
                t.id as id,
                a.id as athlete_id,
                c.id as countries_id,
                t.'. $row .' as `'. $row .'`,
                t.penalty as penalty,
                t.disqualified as disqualified,
                a.first_name as first_name,
                a.last_name as last_name,
                a.description as description,
                a.birthdate as birthdate,
                a.sex as sex,
                a.countries_id as countries_id,
                c.iso_2 as iso_2,
                c.iso_3 as iso_3,
                c.name as country_name
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            INNER JOIN countries c ON a.countries_id = c.id
            ORDER BY t.'. $row .' ASC
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

    public function getApiDisplayDataBySportIdDetail($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        if ($id === '1'){
            $table = 'times_sprint';
            $name = 'sprint';
            $row = 'time';
        }elseif ($id === '2'){
            $table = 'times_swimming';
            $name = 'swimming';
            $row = 'time';
        }elseif ($id === '3'){
            $table = 'times_showjumping';
            $name = 'showjumping';
            $row = 'time';
        }elseif ($id === '4'){
            $table = 'times_longjump';
            $name = 'longjump';
            $row = 'distance';
        }else {
            //error are 4 ur mom
            return array('your' => 'mom');
        }

        $sql1 = '
            SELECT count(t.disqualified) as disqualified, SUM(t.penalty) as penalties
            FROM '. $table .' t
            WHERE t.disqualified = 1
        ';
        $stmt1 = $connection->prepare($sql1);
        $resultSet1 = $stmt1->executeQuery();

        $sql2 = '
            SELECT s.description
            FROM sports s
            WHERE s.name = \'' . $name . '\'
        ';
        $stmt2 = $connection->prepare($sql2);
        $resultSet2 = $stmt2->executeQuery();

        $sql3 = '
            SELECT
                t.'. $row .' as `'. $row .'`,
                a.first_name as first_name,
                a.last_name as last_name
            FROM '. $table .' t
            INNER JOIN athletes a ON t.athlete_id = a.id
            ORDER BY t.'. $row .' ASC
            LIMIT 1
        ';
        $stmt3 = $connection->prepare($sql3);
        $resultSet3 = $stmt3->executeQuery();


        $data1 = $resultSet1->fetchAllAssociative();
        $data2 = $resultSet2->fetchAllAssociative();
        $data3 = $resultSet3->fetchAllAssociative();

        return array($data1, $data2, $data3);
    }
}
