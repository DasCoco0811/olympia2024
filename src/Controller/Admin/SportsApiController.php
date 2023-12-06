<?php
namespace App\Controller\Admin;

use App\Entity\Sports;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SportsApiController extends AbstractController
{
    /*
     * param kann "all" für alle, oder eine Zahl für eine gewisse Sportart sein
     */
    #[Route('/api/sports/all/{param}', name: 'sports')]
    public function index(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Sports::class);

        if ($param == "all") {
            $data = $repository->getApiAllSports();
        } elseif (is_numeric($param)) {
            $data = $repository->getApiByIdSport($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * param kann "all" für alle, oder eine Zahl für eine gewisse Sportart sein
     */
    #[Route('/api/sports/besttimes/{param}', name: 'sports_detail')]
    public function sportDetailIndex(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Sports::class);

        if (is_numeric($param)) {
            $data = $repository->getApiByDetailId($param);
        }

        return new Response(json_encode($data));
    }
}