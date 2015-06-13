<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team_member', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
            $table->unsignedInteger('avatar');

            $table->foreign('avatar')->references('id')->on('avatar');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('team_member');
	}

}
