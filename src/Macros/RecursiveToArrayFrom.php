<?php

namespace Pulli\CollectionMacros\Macros;

use Closure;
use Illuminate\Support\Collection;

class RecursiveToArrayFrom
{
    public function __invoke(): Closure
    {
        return function (array $ary): array {
            $closure = function (&$ary) {
                if (is_array($ary)) {
                    $ary = Collection::recursiveToArrayFrom($ary);
                }

                if (is_object($ary) && method_exists($ary, 'toArray')) {
                    $ary = Collection::recursiveToArrayFrom($ary->toArray());
                }
            };

            array_walk($ary, $closure);

            return $ary;
        };
    }
}
