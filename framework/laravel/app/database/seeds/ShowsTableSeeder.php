<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class ShowsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('shows')->delete();

        $data = [
            ['Happy Days', '1979'],
            ['Seinfeld', '1999'],
            ['Arrested Development', '2006'],
            ['Friends', '1997'],
        ];
		foreach($data as $entry)
		{
			Show::create([
                'name'  => $entry[0],
                'year'  => $entry[1]
			]);
		}
	}

}