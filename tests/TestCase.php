<?php

namespace Jringeisen\WireCharts\Tests;

use Jringeisen\WireCharts\WireChartsServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setup(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            WireChartsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup.
    }
}
