<?php

namespace App\Controller\Admin;

use App\Entity\Soutenance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;

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
            IntegerField::new('numjury'),
            TextField::new('datesoutenanceFormatted', 'Date soutenance')->hideOnForm(),
            TextField::new('datesoutenanceInput', 'Date soutenance')
                ->onlyOnForms()
                ->setFormType(TextType::class)
                ->setFormTypeOptions([
                    'required' => true,
                    'constraints' => [
                        new Assert\NotBlank(message: 'La date de soutenance est obligatoire.'),
                        new Assert\Regex(
                            pattern: '/^\d{4}-\d{2}-\d{2}$/',
                            message: 'Utilisez le format de date YYYY-MM-DD.'
                        ),
                    ],
                    'attr' => [
                        'type' => 'date',
                        'placeholder' => 'YYYY-MM-DD',
                    ],
                ]),
            NumberField::new('note'),
            AssociationField::new('enseignant'),
        ];
    }
}