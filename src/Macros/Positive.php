<?php

namespace Pulli\CollectionMacros\Macros;

use Closure;

class Positive
{
    public function __invoke(): Closure
    {
        return function (): bool {
            return $this->count() > 0;
        };
    }
}
