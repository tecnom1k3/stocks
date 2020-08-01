<?php

namespace App\Providers;

use Acme\Service\Contract\HttpClientInterface;
use Acme\Service\HttpClientService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class HttpClientServiceProvider
 * @package App\Providers
 */
class HttpClientServiceProvider extends ServiceProvider implements DeferrableProvider
{


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(HttpClientInterface::class, HttpClientService::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [HttpClientInterface::class];
    }
}
