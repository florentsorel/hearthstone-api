<?php

namespace Rtransat\Hearthstone\Providers;

use Illuminate\Support\ServiceProvider;
use Rtransat\Hearthstone\Client;

/**
 * Class ApiServiceProvider
 * @package Rtransat\Hearthstone\Providers
 */
class ApiServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/hearthstone-api.php' => config_path('hearthstone-api.php'),
        ]);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('hearthstone-api', function ($app) {
            $client = new Client();

            return $client->cards();
        });

        $this->mergeConfig();
    }

    /**
     * Merge config
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/hearthstone-api.php', 'hearthstone-api'
        );
    }
}
