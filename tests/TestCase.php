<?php

namespace TestMonitor\NestedMigrations\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use TestMonitor\NestedMigrations\MigrationServiceProvider;

class TestCase extends OrchestraTestCase
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            MigrationServiceProvider::class,
        ];
    }
}
