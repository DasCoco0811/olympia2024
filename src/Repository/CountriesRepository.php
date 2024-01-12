<?php

namespace App\Repository;

use App\Entity\Countries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Countries>
 *
 * @method Countries|null find($id, $lockMode = null, $lockVersion = null)
 * @method Countries|null findOneBy(array $criteria, array $orderBy = null)
 * @method Countries[]    findAll()
 * @method Countries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Countries::class);
    }

    public function getApiAllCountries(): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM countries
        ';

        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByIdCountries($id): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM countries
            WHERE id = ?
        ';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
    }

    public function getApiByIdCountriesAndMedals(): array
    {
        $connection = $this->getEntityManager()->getConnection();
        $result = array();

        $sql = '
            SELECT id, name
            FROM countries
        ';
        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        $sqlResult = $resultSet->fetchAllAssociative();

        $a = array('sprint', 'swimming', 'showjumping', 'longjump');

        foreach ($sqlResult as $country) {
            $gold = 0;
            $silver = 0;
            $bronze = 0;

            foreach ($a as $b){
                if ($b == 'longjump'){
                    $row = 'distance';
                }else {
                    $row = 'time';
                }

                $sql2 = '
                    SELECT countries_id
                    FROM times_'. $b .' t
                    INNER JOIN athletes a ON t.athlete_id = a.id
                    INNER JOIN countries c ON a.countries_id = c.id
                    ORDER BY '. $row .' ASC
                    LIMIT 3
                ';

                $stmt2 = $connection->prepare($sql2);
                $resultSet2 = $stmt2->executeQuery();

                $sqlResult2 = $resultSet2->fetchAllAssociative();

                $rank = 0;

                if (isset($sqlResult2)) {
                    foreach ($sqlResult2 as $c){
                        if ($c['countries_id'] == $country['id']) {
                            if ($rank == 0){
                                $gold++;
                            }
                            if ($rank == 1){
                                $silver++;
                            }
                            if ($rank == 2){
                                $bronze++;
                            }
                        }
                        $rank++;
                    }
                }

                $medals = array(
                    'country_id' => $country['id'],
                    'country_name' => $country['name'],
                    'gold' => $gold,
                    'silver' => $silver,
                    'bronze' => $bronze,
                );
            }
            $result[] = $medals;
        }

        return $result;
    }

    public function getApiByAllCountryMedalsAndPlayers(): array
    {
        $connection = $this->getEntityManager()->getConnection();
        $result = array();

        $sql = '
            SELECT id, name
            FROM countries
        ';
        $stmt = $connection->prepare($sql);
        $resultSet = $stmt->executeQuery();

        $countries = $resultSet->fetchAllAssociative();

        $a = array('sprint', 'swimming', 'showjumping', 'longjump');

        foreach ($countries as $country) {
            $gold = 0;
            $silver = 0;
            $bronze = 0;

            $sql1 = '
                    SELECT *
                    FROM athletes
                    WHERE countries_id = ?
                ';

            $stmt1 = $connection->prepare($sql1);
            $stmt1->bindValue(1, $country['id']);
            $resultSet1 = $stmt1->executeQuery();

            $sqlResult1 = $resultSet1->fetchAllAssociative();

            foreach ($a as $b){
                if ($b == 'longjump'){
                    $row = 'distance';
                }else {
                    $row = 'time';
                }

                $sql2 = '
                    SELECT countries_id
                    FROM times_'. $b .' t
                    INNER JOIN athletes a ON t.athlete_id = a.id
                    INNER JOIN countries c ON a.countries_id = c.id
                    ORDER BY '. $row .' ASC
                    LIMIT 3
                ';

                $stmt2 = $connection->prepare($sql2);
                $resultSet2 = $stmt2->executeQuery();

                $sqlResult2 = $resultSet2->fetchAllAssociative();

                $rank = 0;

                if (isset($sqlResult2)) {
                    foreach ($sqlResult2 as $c){
                        if ($c['countries_id'] == $country['id']) {
                            if ($rank == 0){
                                $gold++;
                            }
                            if ($rank == 1){
                                $silver++;
                            }
                            if ($rank == 2){
                                $bronze++;
                            }
                        }
                        $rank++;
                    }
                }

                $medals = array(
                    'country_id' => $country['id'],
                    'country_name' => $country['name'],
                    'gold' => $gold,
                    'silver' => $silver,
                    'bronze' => $bronze,
                );
            }
            $medals['players'] = $sqlResult1;
            $result[] = $medals;
        }

        return $result;
    }
}
