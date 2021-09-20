<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksAuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		for ($i = 1; $i <= 200000000; $i++) {
			DB::table('books_authors')->insert([
				'book_id' => rand(1, 100000),
				'author_id' => rand(1, 2000)
			]);
		}
    }
}
