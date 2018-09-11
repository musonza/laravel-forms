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
        $this->publishConfig();

        require __DIR__ . '/Http/routes.php';
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

        $this->publishes([$stub => $target], 'form.migrations');
    }

    /**
     * Publish package's config file.
     *
     * @return void
     */
    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config' => config_path(),
        ], 'laravel_forms.config');
    }
}
