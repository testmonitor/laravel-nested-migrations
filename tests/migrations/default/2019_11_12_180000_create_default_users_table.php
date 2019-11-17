<?php

use Illuminate\Database\Migrations\Migration;

class CreateDefaultUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');

            $table->timestamps();
        });

        DB::table('users')->insert([
            'email' => 'hello@testmonitor.com',
            'password' => Hash::make('welcome1!'),
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
