<?php

namespace App\Controller\Admin;

use App\Entity\Times;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TimesApiController extends AbstractController
{
    /*
     * param kann "all" für alle Zeiten, "allf" für alle Zeiten mit weiblichen Athleten,
     * "allm" für alle Zeiten mit männlichen Athleten, oder eine Zahl für eine gewisse Zeit sein
     */
    #[Route('/api/times/single/{param}', name: 'times')]
    public function index(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Times::class);

        if ($param == "allf") {
            $data = $repository->getApiAllFTimes();
        }elseif ($param == "allm"){
            $data = $repository->getApiAllMTimes();
        }elseif ($param == "all") {
            $data = $repository->getApiAllTimes();
        } elseif (is_numeric($param)) {
            $data = $repository->getApiByIdTimes($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * param kann eine Zahl sein, um alle Zeiten eines gewissen Athleten mit dieser ID zu bekommen
     */
    #[Route('/api/times/athlete/{param}', name: 'times_athlete')]
    public function athleteIndex(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Times::class);

        if (is_numeric($param)) {
            $data = $repository->getApiByAthleteIdTimes($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * param kann eine Zahl sein, um alle Zeiten einer gewissen Sportart mit dieser ID zu bekommen
     */
    #[Route('/api/times/sport/all/{param}', name: 'times_sport')]
    public function sportIndex(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Times::class);

        if (is_numeric($param)) {
            $data = $repository->getApiBySportIdTimes($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * param kann eine Zahl sein, um alle Zeiten einer gewissen Sportart der Frauen mit dieser ID zu bekommen
     */
    #[Route('/api/times/sport/female/{param}', name: 'times_female_sport')]
    public function femaleSportIndex(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Times::class);

        if (is_numeric($param)) {
            $data = $repository->getApiFBySportIdTimes($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * param kann eine Zahl sein, um alle Zeiten einer gewissen Sportart der Männer mit dieser ID zu bekommen
     */
    #[Route('/api/times/sport/male/{param}', name: 'times_male_sport')]
    public function MaleSportIndex(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Times::class);

        if (is_numeric($param)) {
            $data = $repository->getApiByMSportIdTimes($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * param kann eine Zahl sein, um die top 3 Zeiten einer gewissen Sportart der Männer mit dieser ID zu bekommen
     */
    #[Route('/api/times/sport/winner/male/{param}', name: 'times_male_sport_winner')]
    public function WinnerMaleSportIndex(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Times::class);

        if (is_numeric($param)) {
            $data = $repository->getApiByWinnerMSportIdTimes($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * param kann eine Zahl sein, um die top 3 Zeiten einer gewissen Sportart der Frauen mit dieser ID zu bekommen
     */
    #[Route('/api/times/sport/winner/female/{param}', name: 'times_female_sport_winner')]
    public function WinnerFemaleSportIndex(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Times::class);

        if (is_numeric($param)) {
            $data = $repository->getApiByWinnerFSportIdTimes($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * param kann eine Zahl sein, um die top 3 Zeiten einer gewissen Sportart der Frauen mit dieser ID zu bekommen
     */
    #[Route('/api/times/sport/topthree', name: 'times_sport_topthree')]
    public function TopThreeSportsIndex(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Times::class);

        $data = $repository->getApiByTopThreeTimes();

        return new Response(json_encode($data));
    }
}