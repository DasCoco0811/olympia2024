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
     * param kann "all" für alle, "allm" für alle männlichen, "allf" für alle weiblichen,
     * oder eine Zahl für einen gewissen Athleten sein
     */
    #[Route('/api/athletes/{param}', name: 'athletes')]
    public function index(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Athletes::class);

        if ($param == "allf") {
            $data = $repository->getApiAllFemaleAthletes();
        }elseif ($param == "allm"){
            $data = $repository->getApiAllMaleAthletes();
        }elseif ($param == "all"){
            $data = $repository->getApiAllAthletes();
        }elseif (is_numeric($param)){
            $data = $repository->getApiByIdAthlete($param);
        }

        return new Response(json_encode($data));
    }
}