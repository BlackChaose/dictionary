<?php

namespace BlackChaose\Dictionary;

use Illuminate\Support\ServiceProvider;

class DictionaryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('BlackChaose\Dictionary\Controllers\DictionaryController');
        $this->app->make('BlackChaose\Dictionary\Models\Dictionary');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadViewsFrom(__DIR__.'/Views/dictionary', 'BlackChaose\Dictionary');
        $this->publishes([
            __DIR__.'/Views/dictionary' => resource_path('/views/vendor/dictionary'),
        ]);
    }
}
