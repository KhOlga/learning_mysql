<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Book::factory()
			->count(2000)
			->has(Author::factory()->count(rand(1, 5)))
			->create();
	}
}
