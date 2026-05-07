<?php

namespace App\Factory;

use App\Entity\Soutenance;
use App\Factory\EnseignantFactory;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Soutenance>
 */
final class SoutenanceFactory extends PersistentObjectFactory
{
    public function __construct()
    {
    }

    #[\Override]
    public static function class(): string
    {
        return Soutenance::class;
    }

    #[\Override]
    protected function defaults(): array|callable
    {
        return [
            'numjury'        => self::faker()->randomNumber(3),
            'datesoutenance' => self::faker()->dateTimeBetween('-1 year', 'now'),
            'note'           => self::faker()->randomFloat(2, 0, 20),
            'enseignant'     => EnseignantFactory::randomOrCreate(),
        ];
    }

    #[\Override]
    protected function initialize(): static
    {
        return $this;
    }
}