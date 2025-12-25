<?php

namespace Pulli\CollectionMacros;

trait HasMacros
{
    public function macros(): array
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
