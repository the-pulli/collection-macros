<?php

namespace Pulli\CollectionMacros\Macros;

use Closure;
use Illuminate\Support\Collection;

class MapToCollection
{
    public function __invoke(): Closure
    {
        return function (array $ary = [], bool $deep = false): Collection {
            $ary = static::mapToCollectionFrom($ary, $deep);
            $data =  static::mapToCollectionFrom($this->all(), $deep);

            if ($ary->isNotEmpty()) {
                return $data->merge([$ary]);
            }

            return $data;
        };
    }
}
