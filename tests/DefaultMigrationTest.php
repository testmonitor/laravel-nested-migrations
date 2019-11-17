<?php

namespace TestMonitor\NestedMigrations\Tests;

class DefaultMigrationTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @throws \Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(realpath(__DIR__ . '/migrations/default'));
    }

    /** @test */
    public function it_runs_the_default_migrations()
    {
        $user = \DB::table('users')->where('id', '=', 1)->first();

        $this->assertEquals('hello@testmonitor.com', $user->email);
        $this->assertTrue(\Hash::check('welcome1!', $user->password));

        $this->assertEquals([
            'id',
            'email',
            'password',
            'created_at',
            'updated_at',
        ], \Schema::getColumnListing('users'));
    }
}
