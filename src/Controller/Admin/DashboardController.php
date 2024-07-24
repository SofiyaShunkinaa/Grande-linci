<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cat;
use App\Entity\Color;
use App\Entity\GuestRequest;
use App\Entity\Kitten;
use App\Entity\KittenStatus;
use App\Entity\Litter;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Grande Linci');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Cats', 'fas fa-list', Cat::class);
        yield MenuItem::linkToCrud('Colors', 'fas fa-list', Color::class);
        yield MenuItem::linkToCrud('Guest requests', 'fas fa-list', GuestRequest::class);
        yield MenuItem::linkToCrud('Kittens', 'fas fa-list', Kitten::class);
        yield MenuItem::linkToCrud('Liters', 'fas fa-list', Litter::class);
        yield MenuItem::linkToCrud('Kittens statuses', 'fas fa-list', KittenStatus::class);
    }
}
