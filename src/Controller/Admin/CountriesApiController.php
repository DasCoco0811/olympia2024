<?php

namespace App\Controller\Admin;

use App\Entity\Countries;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountriesApiController extends AbstractController
{
    /*
     * param kann "all" für alle, oder eine Zahl für ein gewisses Land sein
     */
    #[Route('/api/countries/id/{param}', name: 'countries')]
    public function index(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Countries::class);

        if ($param == "all") {
            $data = $repository->getApiAllCountries();
        } elseif (is_numeric($param)) {
            $data = $repository->getApiByIdCountries($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * alle Länder mit den Medaillen dynamisch dazu berechneten
     */
    #[Route('/api/countries/medals', name: 'countries_medals')]
    public function countryMedalIndex(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Countries::class);

        $data = $repository->getApiByIdCountriesAndMedals();

        return new Response(json_encode($data));
    }

    /*
     * alle Länder mit den Medaillen dynamisch dazu berechneten
     */
    #[Route('/api/countries/all/medals', name: 'countries_players_medals')]
    public function countryAllMedalIndex(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Countries::class);

        $data = $repository->getApiByAllCountryMedalsAndPlayers();

        return new Response(json_encode($data));
    }
}