<?php

namespace ByteNexSolutions\DynaLog\Providers;

use Illuminate\Support\ServiceProvider;
use ByteNexSolutions\DynaLog\Services\LoggerFactory;

class DynaLogServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Merge default config
        $this->mergeConfigFrom(__DIR__ . '/../../config/dynalog.php', 'dynalog');

        // Bind factory
        $this->app->singleton('dynalog', function () {
            return new LoggerFactory();
        });
    }

    public function boot()
    {
        // Publicar config
        $this->publishes([
            __DIR__ . '/../../config/dynalog.php' => config_path('dynalog.php'),
        ], 'config');
    }
}
