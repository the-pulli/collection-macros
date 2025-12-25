<?php

namespace Pulli\CollectionMacros\Macros;

use Closure;
use Illuminate\Support\Collection;

/**
 * Returns recursively all items to array
 *
 * @param  array  $ary
 *
 * @mixin Collection
 *
 * @return array<mixed, array>
 */
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
