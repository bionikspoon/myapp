<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		$faker = Faker::create();

		foreach(range(1, 25) as $index)
		{
			User::create([
				'email' => $faker->email,
				'password' => Hash::make($faker->word)
			]);
		}
	}

}