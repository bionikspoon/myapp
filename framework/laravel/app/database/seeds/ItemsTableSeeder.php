<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('items')->delete();
		$faker = Faker::create();

		foreach(range(1, 50) as $index)
		{
			$company = $faker->company;
			Item::create([
				'name' 			=> $company,
				'description'	=> 'This is a ' . $company,
				'price'			=> $faker->randomNumber(5)
			]);
		}
	}

}