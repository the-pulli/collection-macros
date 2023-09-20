<?php

namespace Pulli\CollectionMacros\Test\Data;

readonly class ChildObject
{
    public function __construct(private string $name)
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
