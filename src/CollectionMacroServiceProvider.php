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
            ->reject(fn (string $class, string $macro) => Collection::hasMacro($macro))
            ->each(fn (string $class, string $macro) => Collection::macro($macro, app($class)()));
    }
}
