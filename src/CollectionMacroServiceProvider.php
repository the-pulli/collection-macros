<?php

namespace Pulli\CollectionMacros;

use Illuminate\Support\Collection;

if (class_exists('\Illuminate\Support\ServiceProvider')) {
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
} else {
    class CollectionMacroServiceProvider {
        use HasMacros;
    }
}
