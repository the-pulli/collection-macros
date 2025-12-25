<?php

namespace Pulli\CollectionMacros;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CollectionMacroServiceProvider extends ServiceProvider
{
    use HasMacros;

    public function register(): void
    {
        Collection::make($this->macros())
            ->reject(fn ($class, $macro) => Collection::hasMacro($macro))
            ->each(fn ($class, $macro) => Collection::macro($macro, app($class)()));
    }
}
