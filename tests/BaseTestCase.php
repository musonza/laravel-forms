<?php

namespace Musonza\Form\Tests;

use CreateFormTables;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Support\Facades\Schema;
use Musonza\Form\User;

require __DIR__ . '/../database/migrations/create_form_tables.php';

trait BaseTestCase
{
    protected function migrateTestTables()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    protected function migrate()
    {
        (new CreateFormTables)->up();
        $this->migrateTestTables();
    }

    public function tearDown(): void
    {
        $this->rollbackTestTables();
        (new CreateFormTables)->down();
        // parent::tearDown();
    }

    public function createUsers($count = 1)
    {
        return factory(User::class, $count)->create();
    }

    protected function rollbackTestTables()
    {
        Schema::drop('users');
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
