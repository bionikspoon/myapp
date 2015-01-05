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
		$data1 = array('name' => 'Walking Dead', 'rating' => '4', 'actor' => 'Andrew Lincoln');
		$data2 = array('name' => 'Revolution', 'rating' => '3', 'actor' => 'Billy Burke');
		$data3 = array('name' => 'Sons of Anarchy', 'rating' => '10', 'actor' => 'Charlie Hunnam');
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
		->where('actor', 'Andrew Lincoln')
		->orWhere('actor', 'Billy Burke')
		->orWhere('actor', 'Charlie Hunnam')
		->delete();
	}

}
