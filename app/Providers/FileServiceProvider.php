<?php

namespace App\Providers;

use Acme\Service\Contract\FileServiceInterface;
use Acme\Service\FileService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class FileServiceProvider
 * @package App\Providers
 */
class FileServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * @return array
     */
    public function provides()
    {
        return [FileServiceInterface::class];
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FileServiceInterface::class, FileService::class);
    }
}
