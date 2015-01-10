<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SuperheroesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('superheroes')->delete();

		$superheroes = [
			[
				'name' => 'Spiderman',
				'city_id' => 1,
				'created_at' => date('Y-m-d g:i:s', time())
			],
			[
				'name' => 'Superman',
				'city_id' => 2,
				'created_at' => date('Y-m-d g:i:s', time())
			],
			[
				'name' => 'Batman',
				'city_id' => 3,
				'created_at' => date('Y-m-d g:i:s', time())
			],
			[
				'name' => 'The Thing',
				'city_id' => 1,
				'created_at' => date('Y-m-d g:i:s', time())
			],

		];

		DB::table('superheroes')->insert($superheroes);
	}

}