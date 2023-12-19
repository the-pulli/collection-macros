<?php

namespace Pulli\CollectionMacros;

trait HasMacros
{
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
