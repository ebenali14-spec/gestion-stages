<?php

namespace App\Form;

use App\Entity\Enseignant;
use App\Entity\Soutenance;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoutenanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numjury', IntegerType::class, [
                'label' => 'Numéro du jury',
            ])
            ->add('datesoutenance', DateType::class, [
                'label'  => 'Date de soutenance',
                'widget' => 'single_text',
                'input'  => 'datetime_immutable',
                'html5'  => true,
            ])
            ->add('note', NumberType::class, [
                'label' => 'Note',
                'scale' => 2,
            ])
            ->add('enseignant', EntityType::class, [
                'class'        => Enseignant::class,
                'choice_label' => fn(Enseignant $e) => $e->getNom().' '.$e->getPrenom(),
                'label'        => 'Enseignant responsable',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Soutenance::class,
        ]);
    }
}