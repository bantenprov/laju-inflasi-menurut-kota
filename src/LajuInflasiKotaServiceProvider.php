<?php

namespace Bantenprov\LajuInflasiKota;

use Illuminate\Support\ServiceProvider;
use Bantenprov\LajuInflasiKota\Console\Commands\LajuInflasiKotaCommand;

/**
 * The LajuInflasiKotaServiceProvider class
 *
 * @package Bantenprov\LajuInflasiKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LajuInflasiKotaServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
        $this->seedHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laju-inflasi-kota', function ($app) {
            return new LajuInflasiKota;
        });

        $this->app->singleton('command.laju-inflasi-kota', function ($app) {
            return new LajuInflasiKotaCommand;
        });

        $this->commands('command.laju-inflasi-kota');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'laju-inflasi-kota',
            'command.laju-inflasi-kota',
        ];
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('laju-inflasi-kota.php');

        $this->mergeConfigFrom($packageConfigPath, 'laju-inflasi-kota');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'laju-inflasi-kota-config');
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'laju-inflasi-kota');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/laju-inflasi-kota'),
        ], 'laju-inflasi-kota-lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'laju-inflasi-kota');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/laju-inflasi-kota'),
        ], 'laju-inflasi-kota-views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'laju-inflasi-kota-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'laju-inflasi-kota-migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'laju-inflasi-kota-public');
    }

    public function seedHandle()
    {
        $packageSeedPath = __DIR__.'/database/seeds';

        $this->publishes([
            $packageSeedPath => base_path('database/seeds')
        ], 'laju-inflasi-kota-seeds');
    }
}
