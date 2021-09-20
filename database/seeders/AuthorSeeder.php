<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();

		for ($i = 1; $i <= 2000; $i++) {
			DB::table('authors')->insert([
				'name' => $faker->lastName(),
				'age' => rand(20, 45)
			]);
		}
    }
}
