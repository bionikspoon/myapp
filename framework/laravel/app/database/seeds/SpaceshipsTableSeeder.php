<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class SpaceshipsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('spaceships')->delete();
        $ships = [
            [
                'name' => 'Enterprise',
                'movie' => 'Star Trek'
            ],
            [
                'name' => 'Millenium Falcon',
                'movie' => 'Star Wars'
            ],
            [
                'name' => 'Serenity',
                'movie' => 'Firefly'
            ],
        ];
        foreach ($ships as $ship) {
            Spaceship::create($ship);
        }
	}

}