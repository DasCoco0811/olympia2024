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
     * top times male, female and overall
     *
     * 1 = spring
     * 2 = swimming
     * 3 = showjumping
     * 4 = longjump
     */
    # einwandfrei mashallah
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