<?php

namespace TestMonitor\NestedMigrations\Tests;

use TestMonitor\NestedMigrations\MigrationServiceProvider;

class NestedMigrationTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @throws \Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(realpath(__DIR__ . '/migrations/nested'));
    }

    /** @test */
    public function it_runs_the_nested_migrations()
    {
        $user = \DB::table('users')->where('id', '=', 1)->first();
        $team = \DB::table('teams')->where('id', '=', 1)->first();

        $this->assertEquals('hello@testmonitor.com', $user->email);
        $this->assertTrue(\Hash::check('welcome1!', $user->password));
        $this->assertEquals('TestMonitor', $team->name);

        $this->assertEquals([
            'id',
            'email',
            'password',
            'created_at',
            'updated_at',
        ], \Schema::getColumnListing('users'));

        $this->assertEquals([
            'id',
            'name',
            'created_at',
            'updated_at',
        ], \Schema::getColumnListing('teams'));
    }
}
