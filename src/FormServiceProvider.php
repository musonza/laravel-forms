<?php

namespace Musonza\Form;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishMigrations();
        $this->publishDatabaseSeeds();
        $this->publishConfig();

        require __DIR__ . '/Http/routes.php';

        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/laravel-forms'),
        ], 'laravel-forms-assets');
    }

    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('form', function () {
            return $this->app->make(\Musonza\Form\Form::class);
        });
    }

    /**
     * Publish package's migrations.
     *
     * @return void
     */
    public function publishMigrations()
    {
        $timestamp = date('Y_m_d_His', time());
        $stub = __DIR__ . '/../database/migrations/create_form_tables.php';
        $target = $this->app->databasePath() . '/migrations/' . $timestamp . '_create_form_tables.php';

        $this->publishes([$stub => $target], 'laravel_forms.migrations');
    }

    /**
     * Publish database seeds.
     *
     * @return void
     */
    public function publishDatabaseSeeds()
    {
        $this->publishes([
            __DIR__ . '/../database/seeds' => database_path() . '/seeds',
        ], 'laravel_forms.database_seeds');
    }

    /**
     * Publish package's config file.
     *
     * @return void
     */
    public function publishConfig()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-forms');
        $this->publishes([
            __DIR__ . '/../config' => config_path(),
        ], 'laravel_forms.config');
    }
}
