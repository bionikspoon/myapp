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
		$sql = 'INSERT INTO shows (name, rating, actor) VALUES (?, ?, ?)';
		$data1 = array('Doctor Who', '9', 'Matt Smith');
		$data2 = array('Arrested Development', '10', 'Jason Bateman');
		$data3 = array('Joanie Loves Chachi', '3', 'Scott Baio');

		DB::insert($sql, $data1);
		DB::insert($sql, $data2);
		DB::insert($sql, $data3);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		$sql = 'DELECT FROM shows WHERE name = ?';
		DB::delete($sql, array('Doctor Who'));
		DB::delete($sql, array('Arrested Development'));
		DB::delete($sql, array('Joanie Loves Chachi'));
	}

}
