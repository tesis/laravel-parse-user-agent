<?php

namespace Tesis\LaravelParseUserAgent\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            \Tesis\LaravelParseUserAgent\Providers\ParseUserAgentServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Set up environment specific configuration
    }
}

