<?php

namespace Tesis\LaravelParseUserAgent\Providers;

use Illuminate\Support\ServiceProvider;
use Tesis\LaravelParseUserAgent\Services\UserAgentParser;
use Tesis\LaravelParseUserAgent\Services\OperatingSystemParser;
use Tesis\LaravelParseUserAgent\Services\BrowserParser;
use Tesis\LaravelParseUserAgent\Services\DeviceTypeParser;

class ParseUserAgentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Merge package config with the application's copy if it exists
        $this->mergeConfigFrom(
            __DIR__ . '/../config/useragentparser.php', 'useragentparser'
        );

        // Register OperatingSystemParser service
        $this->app->singleton(OperatingSystemParser::class, function () {
            return new OperatingSystemParser();
        });

        // Register BrowserParser service
        $this->app->singleton(BrowserParser::class, function () {
            return new BrowserParser();
        });

        // Register DeviceTypeParser service
        $this->app->singleton(DeviceTypeParser::class, function () {
            return new DeviceTypeParser();
        });

        // Register the main UserAgentParser service, injecting dependencies
        $this->app->singleton(UserAgentParser::class, function ($app) {
            return new UserAgentParser(
                $app->make(OperatingSystemParser::class),
                $app->make(BrowserParser::class),
                $app->make(DeviceTypeParser::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Publish config file to the application's config directory
        $this->publishes([
            __DIR__ . '/../config/useragentparser.php' => config_path('useragentparser.php'),
        ], 'config');
    }
}
