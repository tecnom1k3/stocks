<?php

namespace App\Providers;

use Acme\Service\Contract\StockServiceInterface;
use Acme\Service\StockService;
use Illuminate\Support\ServiceProvider;

/**
 * Class StockServiceProvider
 * @package App\Providers
 */
class StockServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(StockServiceInterface::class, StockService::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            StockServiceInterface::class
        ];
    }


}
