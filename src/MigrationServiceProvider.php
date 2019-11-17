<?php

namespace TestMonitor\NestedMigrations;

use TestMonitor\NestedMigrations\Migrations\Migrator;
use Illuminate\Database\MigrationServiceProvider as IlluminateMigrationServiceProvider;

class MigrationServiceProvider extends IlluminateMigrationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Override the default Laravel migrator.
        $this->app->singleton('migrator', function ($app) {
            $repository = $app['migration.repository'];

            return new Migrator($repository, $app['db'], $app['files'], $app['events']);
        });
    }
}
