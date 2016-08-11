<?php
namespace Revolution\Calling\Providers;

use Illuminate\Support\ServiceProvider;

use Revolution\Calling\Calling;

class CallingServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the service provider.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Calling::class, function ($app) {
            return new Calling();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [Calling::class];
    }
}
