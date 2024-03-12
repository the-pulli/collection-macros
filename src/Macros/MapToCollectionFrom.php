<?php

namespace Pulli\CollectionMacros\Macros;

use Closure;
use Illuminate\Support\Collection;

class MapToCollectionFrom
{
    public function __invoke(): Closure
    {
        return function (array $ary, bool $deep = false): Collection {
            $closure = function (&$ary) use ($deep) {
                if (is_array($ary)) {
                    $ary = static::mapToCollectionFrom($ary, $deep);
                }

                if ($deep && is_object($ary) && method_exists($ary, 'toArray')) {
                    $ary = static::mapToCollectionFrom($ary->toArray(), $deep);
                }
            };

            array_walk($ary, $closure);

            return static::make($ary);
        };
    }
}
