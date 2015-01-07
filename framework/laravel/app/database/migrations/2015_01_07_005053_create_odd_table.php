<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOddTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('odd', function(Blueprint $table)
		{
			$table->increments('myIDcolumn');
			$table->string('MyUsernameGoesHere');
			$table->string('ThisIsAnEmail');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('odd');
	}

}
