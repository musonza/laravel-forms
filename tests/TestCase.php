<?php

namespace Musonza\Form\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use BaseTestCase;

    public $tablePrefix = 'mc_';

    public function setUp(): void
    {
        parent::setUp();

        //$this->artisan('migrate', ['--database' => 'testbench']);
        $this->withFactories(__DIR__ . '/../database/factories');
        $this->migrate();
        $this->users = $this->createUsers(6);
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
        $app['config']->set('app.debug', true);
    }
}
