<?php

namespace App\DataFixtures;

use App\Factory\EnseignantFactory;
use App\Factory\SoutenanceFactory;
use App\Factory\EtudiantFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        EnseignantFactory::createMany(5);
        SoutenanceFactory::createMany(10);
        EtudiantFactory::createMany(20);
    }
}