<?php

namespace Axdlee\Config;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind it only once so we can reuse in IoC
        $this->app->singleton('Axdlee\Config\Repository', function($app, $items)
        {
            $writer = new FileWriter($app['files'], $app['path.config']);
            return new Repository($items, $writer);
        });

        $config_items = app('config')->all();
        $this->app->singleton('config', function($app) use ($config_items)
        {
            return $app->makeWith('Axdlee\Config\Repository', $config_items);
        });
    }
}
