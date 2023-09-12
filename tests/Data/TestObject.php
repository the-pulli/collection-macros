<?php

namespace Pulli\CollectionMacros\Test\Data;

readonly class TestObject
{
    public function __construct(private string $name, private string $job)
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'job' => $this->job,
        ];
    }
}
