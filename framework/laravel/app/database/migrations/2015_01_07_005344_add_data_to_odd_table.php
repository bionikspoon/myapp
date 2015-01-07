<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToOddTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$data = [
			[
				'MyUsernameGoesHere' => 'John Doe',
				'ThisIsAnEmail' => 'johndoe@myapp.dev',
			],
			[
				'MyUsernameGoesHere' => 'JaneDoe',
				'ThisIsAnEmail' => 'janedoe@myapp.dev',
			],
		];
		DB::table('odd')->insert($data);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('odd')->delete();
	}

}
