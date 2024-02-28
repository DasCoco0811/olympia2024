<?php
namespace App\Controller\Admin;

use App\Entity\Athletes;
use App\Entity\Sports;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SportsApiController extends AbstractController
{
    /*
     * top time of a sport overall
     *
     * 1 = sprint
     * 2 = swimming
     * 3 = showjumping
     * 4 = longjump
     */
    # einwandfrei mashallah
    #[Route('/api/sports/best/{param}', name: 'sports_best_detail')]
    public function sportDetailBestIndex(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Sports::class);

        if (is_numeric($param)) {
            $data = $repository->getApiBySportIdBest($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * top times male, female and overall
     *
     * 1 = sprint
     * 2 = swimming
     * 3 = showjumping
     * 4 = longjump
     */
    # einwandfrei mashallah
    #[Route('/api/sports/matches/{param}', name: 'sports_detail')]
    public function sportDetailIndex(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Sports::class);
        $repositoryAthlete = $entityManager->getRepository(Athletes::class);

        $data = array();
        $matchDataFemale = array();
        $matchDataMale = array();
        switch ($param) {
            case "longjump":
                $data = $repository->getApiLongJump();

                foreach ($data as $athleteTime) {
                    $jumpLength = array(
                        0 => $athleteTime["distance1"],
                        1 => $athleteTime["distance2"],
                        2 => $athleteTime["distance3"],
                    );

                    $newAthleteTime = array(
                        "id" => $athleteTime['id'],
                        "athleteId" => $athleteTime['athlete_id'],
                        "jumpLength" => $jumpLength,
                        "disqualified" => $athleteTime['disqualified'] === 1,
                    );

                    if ($athleteTime['athlete_sex'] === "f") {
                        array_push($matchDataFemale, $newAthleteTime);
                    }
                    if ($athleteTime['athlete_sex'] === "m") {
                        array_push($matchDataMale, $newAthleteTime);
                    }
                }

                $data = $this->createMatchDataArray($matchDataMale, $matchDataFemale);
                break;
            case "sprint":
                $data = $repository->getApiSprint();

                foreach ($data as $athleteTime) {
                    $newAthleteTime = array(
                        "id" => $athleteTime['id'],
                        "athleteId" => $athleteTime['athlete_id'],
                        "time" => $athleteTime['time'],
                        "disqualified" => $athleteTime['disqualified'] === 1,
                    );

                    if ($athleteTime['athlete_sex'] === "f") {
                        array_push($matchDataFemale, $newAthleteTime);
                    }
                    if ($athleteTime['athlete_sex'] === "m") {
                        array_push($matchDataMale, $newAthleteTime);
                    }
                }

                $data = $this->createMatchDataArray($matchDataMale, $matchDataFemale);
                break;
            case "showjumping":
                $data = $repository->getApiShowJumping();

                foreach ($data as $athleteTime) {
                    $newAthleteTime = array(
                        "id" => $athleteTime['id'],
                        "athleteId" => $athleteTime['athlete_id'],
                        "time" => $athleteTime['time'],
                        "penaltyPoints" => $athleteTime['penalty'],
                        "disqualified" => $athleteTime['disqualified'] === 1,
                    );

                    if ($athleteTime['athlete_sex'] === "f") {
                        array_push($matchDataFemale, $newAthleteTime);
                    }
                    if ($athleteTime['athlete_sex'] === "m") {
                        array_push($matchDataMale, $newAthleteTime);
                    }
                }

                $data = $this->createMatchDataArray($matchDataMale, $matchDataFemale);
                break;
            case "swimming":
                $data = $repository->getApiSwimming();

                foreach ($data as $athleteTime) {
                    $newAthleteTime = array(
                        "id" => $athleteTime['id'],
                        "athleteId" => $athleteTime['athlete_id'],
                        "time" => $athleteTime['time'],
                        "disqualified" => $athleteTime['disqualified'] === 1,
                    );

                    if ($athleteTime['athlete_sex'] === "f") {
                        array_push($matchDataFemale, $newAthleteTime);
                    }
                    if ($athleteTime['athlete_sex'] === "m") {
                        array_push($matchDataMale, $newAthleteTime);
                    }
                }

                $data = $this->createMatchDataArray($matchDataMale, $matchDataFemale);
                break;
        }

        return new Response(json_encode($data));
    }

    /*
     * Sportart Data By id
     * mist
     */
    # mashallah einwandfrei
    #[Route('/api/sport/display/{param}', name: 'sports_display_detail')]
    public function sportDetailIndexByID(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Sports::class);

        if (is_numeric($param)) {
            $data = $repository->getApiDisplayDataBySportIdDetail($param);
        }

        return new Response(json_encode($data));
    }

    private function createMatchDataArray($matchDataMale, $matchDataFemale) {
        return array(
            0 => array(
                "sex" => "m",
                "matchData" => $matchDataMale
            ),
            1 => array(
                "sex" => "f",
                "matchData" => $matchDataFemale
            ),
        );
    }
}