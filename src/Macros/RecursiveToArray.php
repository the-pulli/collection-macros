<?php

namespace Pulli\CollectionMacros\Macros;

use Closure;
use Illuminate\Support\Collection;

class RecursiveToArray
{
    public function __invoke(): Closure
    {
        return function (array $ary = []): array {
            return array_merge(
                Collection::recursiveToArrayFrom($this->all()),
                Collection::recursiveToArrayFrom($ary)
            );
        };
    }
}
