<?php

namespace YannSoaz\LaravelSEO;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LaravelSEOProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('seo-edit', SEOEditComponent::class);
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../views', 'ys-seo');
        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/ys-seo'),
        ]);
    
    }
}
