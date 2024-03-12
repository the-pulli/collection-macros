<?php

namespace Pulli\CollectionMacros\Macros;

use Closure;

class RecursiveToArrayFrom
{
    public function __invoke(): Closure
    {
        return function (array $ary): array {
            $closure = function (&$ary) {
                if (is_array($ary)) {
                    $ary = static::recursiveToArrayFrom($ary);
                }

                if (is_object($ary) && method_exists($ary, 'toArray')) {
                    $ary = static::recursiveToArrayFrom($ary->toArray());
                }
            };

            array_walk($ary, $closure);

            return $ary;
        };
    }
}
