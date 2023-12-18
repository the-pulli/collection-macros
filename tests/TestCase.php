<?php

namespace Pulli\CollectionMacros\Test;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Pulli\CollectionMacros\CollectionMacroServiceProvider;
use ReflectionClass;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        $this->createDummyprovider()->register();
    }

    protected function createDummyprovider(): CollectionMacroServiceProvider
    {
        $reflectionClass = new ReflectionClass(CollectionMacroServiceProvider::class);

        return $reflectionClass->newInstanceWithoutConstructor();
    }
}
