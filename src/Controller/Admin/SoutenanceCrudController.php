<?php

namespace App\Controller\Admin;

use App\Entity\Soutenance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class SoutenanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Soutenance::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            IntegerField::new('numjury', 'N° Jury'),
            DateField::new('datesoutenance', 'Date de soutenance'),
            NumberField::new('note', 'Note'),
            AssociationField::new('enseignant', 'Enseignant'),
        ];
    }
}