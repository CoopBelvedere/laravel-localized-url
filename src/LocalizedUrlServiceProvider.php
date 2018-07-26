<?php

namespace Belvedere\LocalizedUrl;

use Illuminate\Support\ServiceProvider;

class LocalizedUrlServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/localized-url.php' => config_path('localized-url.php'),
        ]);
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('LocalizedUrl', function ($app) {
            return new LocalizedUrl($app);
        });
    }
}
