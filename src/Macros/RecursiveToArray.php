<?php

namespace Pulli\CollectionMacros\Macros;

use Closure;

class RecursiveToArray
{
    public function __invoke(): Closure
    {
        return function (array $ary = []): array {
            return array_merge(
                static::recursiveToArrayFrom($this->all()),
                static::recursiveToArrayFrom($ary)
            );
        };
    }
}
