<?php

use Illuminate\Support\Collection;

if (! class_exists('\Illuminate\Foundation\Application')) {
    $provider = new \Pulli\CollectionMacros\StaticCollectionMacroProvider;
    Collection::make($provider->macros())
        ->reject(fn ($class, $macro) => Collection::hasMacro($macro))
        ->each(fn ($class, $macro) => Collection::macro($macro, (new $class)()));
}
