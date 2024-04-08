<?php

namespace Pulli\CollectionMacros;

use Illuminate\Support\Collection;

class CollectionMacroServiceProvider extends \Illuminate\Support\ServiceProvider
{
    use HasMacros;

    public function register(): void
    {
        Collection::make(self::macros())
            ->reject(fn ($class, $macro) => Collection::hasMacro($macro))
            ->each(fn ($class, $macro) => Collection::macro($macro, app($class)()));
    }
}
