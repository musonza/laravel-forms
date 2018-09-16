<?php

namespace Musonza\Form\Tests;

require __DIR__ . '/../database/migrations/create_form_tables.php';

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Orchestra\Testbench\Dusk\TestCase;

class BrowserTestCase extends TestCase
{
    /**
     * Define environment setup.
     *
     * @param  Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // \Orchestra\Testbench\Dusk\Options::withoutUI();

        // $this->disableExceptionHandling($app);

        $app['router']->get('hello', ['as' => 'hi', 'uses' => function () {
            return 'hello world';
        }]);

        $app['config']->set('database.default', 'sqlite');
        // $app['config']->set('app.url', 'sqlite');
    }

    protected function getPackageProviders($app)
    {
        return [
            \Orchestra\Database\ConsoleServiceProvider::class,
            \Musonza\Form\FormServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Form' => \Musonza\Form\Facades\FormFacade::class,
        ];
    }

    protected function disableExceptionHandling($app)
    {
        $app->instance(ExceptionHandler::class, new class extends Handler
        {
            public function __construct()
            {
            }

            public function report(\Exception $e)
            {
                // no-op
            }

            public function render($request, \Exception $e)
            {
                throw $e;
            }
        });
    }
}
