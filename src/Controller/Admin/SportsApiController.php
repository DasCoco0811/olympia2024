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
     * top time of a sport overall
     *
     * 1 = spring
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

    #[Route('/test/kimko', name: 'testkimko')]
    public function testKimko(){

    }


    /*
     * top times male, female and overall
     *
     * 1 = spring
     * 2 = swimming
     * 3 = showjumping
     * 4 = longjump
     */
    # einwandfrei mashallah
    #[Route('/api/sport/all/{param}', name: 'sports_detail')]
    public function sportDetailIndex(EntityManagerInterface $entityManager, string $param): Response
    {
        $repository = $entityManager->getRepository(Sports::class);

        if (is_numeric($param)) {
            $data = $repository->getApiBySportIdDetail($param);
        }

        return new Response(json_encode($data));
    }

    /*
     * Sportart Data By id
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
}