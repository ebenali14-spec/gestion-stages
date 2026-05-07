<?php

namespace App\Factory;
use App\Factory\SoutenanceFactory;
use App\Entity\Etudiant;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Etudiant>
 */
final class EtudiantFactory extends PersistentObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    #[\Override]
    public static function class(): string
    {
        return Etudiant::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    #[\Override]
 protected function defaults(): array|callable
{
    return [
        'nce' => self::faker()->randomNumber(6),
        'nom' => self::faker()->lastName(),
        'prenom' => self::faker()->firstName(),
        'soutenance' => SoutenanceFactory::randomOrCreate(),
    ];
}

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Etudiant $etudiant): void {})
        ;
    }
}
