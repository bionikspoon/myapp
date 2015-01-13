<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class BookpricesTableSeeder extends Seeder {

	public function run()
	{
		// $faker = Faker::create();

		// foreach(range(1, 10) as $index)
		// {
		// 	Bookprice::create([

		// 	]);
		// }

		DB::table('bookprices')->delete();
		$bookprices = [
			['14.99', 'Alice in Wonderland'],
			['24.50', 'Frankenstein'],
			['29.80', 'War and Peace'],
			['11.08', 'Moby Dick'],
			['19.72', 'The Wizard of Oz'],
			['45.00', 'The Odyssey'],
		];
		foreach ($bookprices as $bookprice) {
			$record = new Bookprice();
			$record->price = $bookprice[0];
			$record->book = $bookprice[1];
			$record->save();

		}
	}

}