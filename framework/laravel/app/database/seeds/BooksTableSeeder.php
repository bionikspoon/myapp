<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder {

	public function run()
	{
		// $faker = Faker::create();

		// foreach(range(1, 10) as $index)
		// {
		// 	Book::create([

		// 	]);
		// }

		DB::table('books')->delete();
		$books = [
			['Alice in Wonderland', 'Lewis Carroll', 'fantasy'],
			['Tom Sawyer', 'Mark Twain', 'comedy'],
			['Gulliver\'s Travels', 'Jonathan Swift', 'fantasy'],
			['The Art of War', 'Sunzi', 'philosophy'],
			['Dracula', 'Bram Stoker', 'horror'],
			['War and Peace', 'Leo Tolstoy', 'drama'],
			['Frankenstein', 'Mary Shelley', 'horror'],
			['The Importance of Being Earnest', 'Oscar Wilde', 'comedy'],
			['Peter Pan', 'J. M. Barrie', 'fantasy'],
		];
		foreach ($books as $book) {
			$insert = new Book();
			$insert->name = $book[0];
			$insert->author = $book[1];
			$insert->genre = $book[2];
			$insert->save();
		}
	}

}