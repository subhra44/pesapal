<?php

namespace Subhra\Pesapal\Providers;

use Illuminate\Support\ServiceProvider;
use Subhra\Pesapal\Pesapal;

class PesapalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/pesapal.php' => config_path('pesapal.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/pesapal.php',
            'pesapal'
        );

        $this->app->singleton('pesapal', function () {
            return new Pesapal();
        });
    }
}
