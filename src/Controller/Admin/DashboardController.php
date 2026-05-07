<?php

namespace App\Controller\Admin;
use App\Entity\Enseignant;
use App\Entity\Etudiant;
use App\Entity\Soutenance;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gestion Stages ISET Charguia');
    }

public function configureMenuItems(): iterable
{
    yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
    yield MenuItem::section('Entités');
    yield MenuItem::linkToCrud('Enseignants', 'fas fa-chalkboard-teacher', Enseignant::class);
    yield MenuItem::linkToCrud('Soutenances', 'fas fa-calendar', Soutenance::class);
    yield MenuItem::linkToCrud('Etudiants', 'fas fa-user-graduate', Etudiant::class);
}
}