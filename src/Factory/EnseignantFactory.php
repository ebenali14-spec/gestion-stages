<?php

namespace App\Factory;
use App\Entity\Enseignant;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Enseignant>
 */
final class EnseignantFactory extends PersistentObjectFactory
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
        return Enseignant::class;
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
        'matricule' => self::faker()->randomNumber(5),
        'nom' => self::faker()->lastName(),
        'prenom' => self::faker()->firstName(),
    ];
}

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Enseignant $enseignant): void {})
        ;
    }
}
