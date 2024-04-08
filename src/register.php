<?php

use Illuminate\Support\Collection;

if (! class_exists('\Illuminate\Foundation\Application')) {
    Collection::make(\Pulli\CollectionMacros\StaticCollectionMacroProvider::macros())
        ->reject(fn ($class, $macro) => Collection::hasMacro($macro))
        ->each(fn ($class, $macro) => Collection::macro($macro, (new $class())()));
}
