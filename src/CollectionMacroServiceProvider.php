<?php

namespace Pulli\CollectionMacros;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CollectionMacroServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Collection::make($this->macros())
            ->reject(fn (string $class, string $macro) => Collection::hasMacro($macro))
            ->each(fn (string $class, string $macro) => Collection::macro($macro, app($class)()));
    }

    private function macros(): array
    {
        return [
            'mapToCollection' => \Pulli\CollectionMacros\Macros\MapToCollection::class,
            'mapToCollectionFrom' => \Pulli\CollectionMacros\Macros\MapToCollectionFrom::class,
            'positive' => \Pulli\CollectionMacros\Macros\Positive::class,
            'recursiveToArray' => \Pulli\CollectionMacros\Macros\RecursiveToArray::class,
            'recursiveToArrayFrom' => \Pulli\CollectionMacros\Macros\RecursiveToArrayFrom::class,
        ];
    }
}
