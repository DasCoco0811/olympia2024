<?php
namespace App\Controller\Admin;

use App\Entity\Athletes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AthletesApiController extends AbstractController
{
    /*
     * Alle Athleten holen
     */
    #[Route('/api/athletes', name: 'athletes')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Athletes::class);

        $data = $repository->getApiAllAthletes();

        $newData = array();
        foreach ($data as $athlete) {
            array_push($newData, array(
                "id" => $athlete['id'],
                "firstName" => $athlete['first_name'],
                "lastName" => $athlete['last_name'],
                "description" => $athlete['description'],
                "sex" => $athlete['sex'],
                "country" => array(
                    "id" => $athlete['countries_id'],
                    "name" => $athlete['name'],
                    "iso2" => $athlete['iso_2'],
                    "iso3" => $athlete['iso_3']
                ),
                "birthdate" => $athlete['birthdate']
            ));
        }

        return new Response(json_encode($newData));
    }
}