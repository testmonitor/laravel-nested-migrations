<?php

use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function ($table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });

        DB::table('teams')->insert([
            'name' => 'TestMonitor',
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
        Schema::drop('teams');
    }
}
