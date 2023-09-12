<?php

use Illuminate\Support\Collection;

$macros = [
  'mapToCollection' => \Pulli\CollectionMacros\Macros\MapToCollection::class
];

if (!function_exists('app')) {
    Collection::make($macros)
        ->reject(fn ($class, $macro) => Collection::hasMacro($macro))
        ->each(fn ($class, $macro) => Collection::macro($macro, (new $class())()));
}
