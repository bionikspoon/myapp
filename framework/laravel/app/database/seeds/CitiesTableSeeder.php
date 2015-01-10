<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CitiesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('cities')->delete();

		$cities = [
			[
				'id' => 1,
				'city' => 'New York',
				'created_at' => date('Y-m-d g:i:s', time())
			],
			[
				'id' => 2,
				'city' => 'Metropolis',
				'created_at' => date('Y-m-d g:i:s', time())
			],
			[
				'id' => 3,
				'city' => 'Gotham',
				'created_at' => date('Y-m-d g:i:s', time())
			]
		];

		DB::table('cities')->insert($cities);
	}

}