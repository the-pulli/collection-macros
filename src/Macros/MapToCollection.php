<?php

namespace Pulli\CollectionMacros\Macros;

use Closure;
use Illuminate\Support\Collection;

class MapToCollection {
    public function __invoke(): Closure
    {
        return function (array $ary, $deep = false): Collection {
            $closure = function (&$ary) use ($deep) {
                if (is_array($ary)) {
                    $ary = Collection::mapToCollection($ary, $deep);
                }

                if ($deep) {
                    if (is_object($ary) && method_exists($ary, 'toArray')) {
                        $ary = Collection::mapToCollection($ary->toArray(), $deep);
                    }
                }
            };

            array_walk($ary, $closure);

            return new Collection($ary);
        };
    }
}
