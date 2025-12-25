<?php

namespace Pulli\CollectionMacros\Test\Data;

readonly class OtherObject
{
    public function __construct(private string $value) {}

    public function toArray(): array
    {
        return [
            'value' => $this->value,
        ];
    }
}
