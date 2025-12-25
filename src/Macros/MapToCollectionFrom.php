<?php

namespace Pulli\CollectionMacros\Macros;

use Closure;
use Illuminate\Support\Collection;
use Pulli\CollectionMacros\IsArrayable;

/**
 * Returns all nested array items as Collection
 *
 * @param  array  $ary
 * @param  bool  $deep
 *
 * @mixin \Illuminate\Support\Collection
 *
 * @return \Illuminate\Support\Collection<mixed, \Illuminate\Support\Collection>
 */
class MapToCollectionFrom
{
    public function __invoke(): Closure
    {
        return function (array $ary, bool $deep = false): Collection {
            $closure = function (&$ary) use ($deep) {
                if (is_array($ary)) {
                    $ary = static::mapToCollectionFrom($ary, $deep);
                }

                if ($deep && IsArrayable::isConvertable($ary)) {
                    $ary = static::mapToCollectionFrom($ary->toArray(), $deep);
                }
            };

            array_walk($ary, $closure);

            return static::make($ary);
        };
    }
}
