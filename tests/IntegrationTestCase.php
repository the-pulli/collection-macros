<?php

namespace Pulli\CollectionMacros\Test;

use Orchestra\Testbench\TestCase as Orchestra;
use Pulli\CollectionMacros\CollectionMacroServiceProvider;

abstract class IntegrationTestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [CollectionMacroServiceProvider::class];
    }

    public function avoidTestMarkedAsRisky(): void
    {
        $this->assertTrue(true);
    }
}
