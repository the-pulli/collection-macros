<?php

namespace Pulli\CollectionMacros;

class IsArrayable
{
    public static function isConvertable(mixed $object): bool
    {
        return is_object($object) && method_exists($object, 'toArray');
    }
}
