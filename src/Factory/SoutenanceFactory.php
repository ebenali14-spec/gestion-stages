<?php

namespace App\Factory;
use App\Factory\EnseignantFactory;
use App\Entity\Soutenance;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Soutenance>
 */
final class SoutenanceFactory extends PersistentObjectFactory
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
        return Soutenance::class;
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
        'numjury' => self::faker()->randomNumber(3),
        'dateSoutenance' => self::faker()->dateTimeBetween('-1 year', 'now'),
        'note' => self::faker()->randomFloat(2, 0, 20),
        'enseignant' => EnseignantFactory::randomOrCreate(),
    ];
}

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Soutenance $soutenance): void {})
        ;
    }
}
