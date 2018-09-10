<?php

namespace Musonza\Form\Tests;

require __DIR__ . '/../database/migrations/create_form_tables.php';

use CreateFormTables;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Musonza\Form\User;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public $tablePrefix = 'mc_';

    public function __construct()
    {
        parent::__construct();
    }

    public function setUp()
    {
        parent::setUp();

        $this->artisan('migrate', ['--database' => 'testbench']);
        $this->withFactories(__DIR__ . '/../database/factories');
        $this->migrate();
        $this->users = $this->createUsers(6);
    }

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

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
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

    public function createUsers($count = 1)
    {
        return factory(User::class, $count)->create();
    }

    public function tearDown()
    {
        $this->rollbackTestTables();
        (new CreateFormTables)->down();
        parent::tearDown();
    }

    protected function rollbackTestTables()
    {
        Schema::drop('users');
    }
}
