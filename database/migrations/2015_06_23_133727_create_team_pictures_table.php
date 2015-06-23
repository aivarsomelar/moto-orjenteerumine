<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamPicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team_pictures', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('picture_id');
			$table->timestamps();

            $table->foreign('team_id')->references('id')->on('users');
            $table->foreign('picture_id')->references('id')->on('pictures');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('team_pictures');
	}

}
