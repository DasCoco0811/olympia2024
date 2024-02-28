<?php

namespace App\Controller\Admin;

use App\Entity\Athletes;
use App\Entity\Countries;
use App\Entity\TimesLongjump;
use App\Entity\TimesShowjumping;
use App\Entity\TimesSprint;
use App\Entity\TimesSwimming;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Olympia Paris 2024');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Accounts', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Athletes', 'fas fa-list', Athletes::class);
        yield MenuItem::linkToCrud('Countries', 'fas fa-list', Countries::class);
        yield MenuItem::linkToCrud('Swimming Times', 'fas fa-list', TimesSwimming::class);
        yield MenuItem::linkToCrud('Sprint Times', 'fas fa-list', TimesSprint::class);
        yield MenuItem::linkToCrud('Showjumping Times', 'fas fa-list', TimesShowjumping::class);
        yield MenuItem::linkToCrud('LongJump Times', 'fas fa-list', TimesLongjump::class);

        /*Falls benötigt
         *  yield MenuItem::linkToCrud('Sports', 'fas fa-list', Sports::class);
         *  yield MenuItem::linkToCrud('Medals', 'fas fa-list', Medals::class);
         *  yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        */
    }
}
