<?php

namespace App\Providers;

use Acme\Service\Contract\JsonMapperServiceInterface;
use Acme\Service\JsonMapperService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class JsonMapperServiceProvider
 * @package App\Providers
 */
class JsonMapperServiceProvider extends ServiceProvider implements DeferrableProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(JsonMapperServiceInterface::class, JsonMapperService::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            JsonMapperServiceInterface::class
        ];
    }
}
