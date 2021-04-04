<?php
namespace Rlc\Csat;

use Illuminate\Support\ServiceProvider;

class CsatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('Rlc\Csat\Controllers\CsatController');
        $this->loadViewsFrom(__DIR__.'/views', 'csat');
        $this->loadMigrationsFrom(__DIR__.'/database', 'csat');
        $this->mergeConfigFrom(__DIR__.'/config.php', 'csat');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
        $this->publishes([
            __DIR__.'/views/assets' => public_path('rlc/csat'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/config.php' => config_path('csat.php'),
        ], 'csat.config');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/csat'),
        ], 'csat.views');

    }
}
