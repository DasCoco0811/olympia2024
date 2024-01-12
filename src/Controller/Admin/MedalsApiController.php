<?php
namespace App\Controller\Admin;

use App\Entity\Medals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedalsApiController extends AbstractController
{
    /*
     * param kann "all" für alle, oder eine Zahl für eine gewisse Medaille sein
     */
    # funzt uwu
    #[Route('/api/medals/{param}', name: 'medals')]
    public function index(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Medals::class);

        if ($param == "all") {
            $data = $repository->getApiAllMedals();
        } elseif (is_numeric($param)) {
            $data = $repository->getApiByIdMedal($param);
        }

        return new Response(json_encode($data));
    }
}