<?php

namespace App\Controller\Admin;

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
        // Optionnel : tu peux aussi rediriger directement vers un CRUD
        // return $this->redirect($this->container->get(AdminUrlGenerator::class)->setController(EnseignantCrudController::class)->generateUrl());
        
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gestion Stages ISET Charguia');
    }

    public function configureMenuItems(): iterable
    {
        // EA5 : Le label 'Dashboard' est obligatoire en 1er argument
        yield MenuItem::linkToDashboard('Dashboard', 'fa-solid fa-home');
        
        yield MenuItem::section('Entités');

        // EA5 : On utilise linkTo() à la place de linkToCrud()
        // Signature : linkTo(string $controllerFqcn, string $label, ?string $icon)
        yield MenuItem::linkTo(EnseignantCrudController::class, 'Enseignants', 'fa-solid fa-chalkboard-user');
        yield MenuItem::linkTo(SoutenanceCrudController::class, 'Soutenances', 'fa-solid fa-calendar-check');
        yield MenuItem::linkTo(EtudiantCrudController::class, 'Etudiants', 'fa-solid fa-user-graduate');
    }
}