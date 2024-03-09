<?php

namespace App\Controller\Admin;

use App\Entity\Athletes;
use App\Entity\Countries;
use App\Entity\TimesLongjump;
use App\Entity\TimesShowjumping;
use App\Entity\TimesSprint;
use App\Entity\TimesSwimming;
use App\Entity\User;
use App\Repository\AthletesRepository;
use App\Repository\CountriesRepository;
use App\Repository\SportsRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    private AthletesRepository $athletesRepository;
    private CountriesRepository $countriesRepository;
    private SportsRepository $sportsRepository;

    public function __construct(
        AthletesRepository $athletesRepository,
        CountriesRepository $countriesRepository,
        SportsRepository $sportsRepository
    ) {
        $this->athletesRepository = $athletesRepository;
        $this->countriesRepository = $countriesRepository;
        $this->sportsRepository = $sportsRepository;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $athletes = $this->athletesRepository->getApiAllAthletes();
        $countries = $this->countriesRepository->getApiAllCountries();
        $longjump = $this->sportsRepository->getApiLongJump();
        $showjumping = $this->sportsRepository->getApiShowJumping();
        $sprint = $this->sportsRepository->getApiSprint();
        $swimming = $this->sportsRepository->getApiSwimming();

        return $this->render('admin/index.html.twig', [
            'athletes' => $athletes,
            'countries' => $countries,
            'longjump' => $longjump,
            'showjumping' => $showjumping,
            'sprint' => $sprint,
            'swimming' => $swimming
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Olympia Paris 2024')
            ->setFaviconPath('favicon.ico')
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section("Account Management");
        yield MenuItem::linkToCrud('Accounts', 'fas fa-user', User::class);

        yield MenuItem::section("Athlete Options");
        yield MenuItem::linkToCrud('Athletes', 'fas fa-list', Athletes::class);
        yield MenuItem::linkToCrud('Countries', 'fas fa-list', Countries::class);

        yield MenuItem::section("Times");
        yield MenuItem::linkToCrud('Swimming Times', 'fas fa-list', TimesSwimming::class);
        yield MenuItem::linkToCrud('Sprint Times', 'fas fa-list', TimesSprint::class);
        yield MenuItem::linkToCrud('Showjumping Times', 'fas fa-list', TimesShowjumping::class);
        yield MenuItem::linkToCrud('LongJump Times', 'fas fa-list', TimesLongjump::class);
    }
}
