<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team_data', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('profile_picture');
            $table->string('description');
			$table->timestamps();

            $table->foreign('team_id')->references('id')->on('users');
            $table->foreign('profile_picture')->references('id')->on('pictures');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('team_data');
	}

}
