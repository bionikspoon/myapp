<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToShowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		$data1 = array('name' => 'Breaking Bad', 'rating' => '10', 'actor' => 'Bryan Cranston');
		$data2 = array('name' => 'Gotham', 'rating' => '6', 'actor' => 'Ben McKenzie');
		$data3 = array('name' => 'Arrow', 'rating' => '7', 'actor' => 'Stephen Amell');
		DB::table('shows')->insert(array($data1, $data2, $data3));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		DB::table('shows')
		->where('name', 'Breaking Bad')
		->orWhere('name', 'Gotham')
		->orWhere('name', 'Arrow')
		->delete();
	}

}
