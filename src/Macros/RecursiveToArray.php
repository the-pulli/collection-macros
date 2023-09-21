<?php

namespace Pulli\CollectionMacros\Macros;

use Illuminate\Support\Collection;

class RecursiveToArray
{
    public function __invoke(): \Closure
    {
        return function(array $ary): array {
            return Collection::mapToCollection($ary, true)->toArray();
        };
    }
}
