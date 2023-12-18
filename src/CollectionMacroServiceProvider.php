<?php

namespace Pulli\CollectionMacros;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CollectionMacroServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Collection::make(self::macros())
            ->reject(fn ($class, $macro) => Collection::hasMacro($macro))
            ->each(fn ($class, $macro) => Collection::macro($macro, app($class)()));
    }

    public static function macros(): array
    {
        return [
            'mapToCollection' => \Pulli\CollectionMacros\Macros\MapToCollection::class,
            'mapToCollectionFrom' => \Pulli\CollectionMacros\Macros\MapToCollectionFrom::class,
            'recursiveToArray' => \Pulli\CollectionMacros\Macros\RecursiveToArray::class,
            'recursiveToArrayFrom' => \Pulli\CollectionMacros\Macros\RecursiveToArrayFrom::class,
        ];
    }
}
