<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();
		for ($i = 1; $i <= 100000; $i++) {
			DB::table('books')->insert([
				'name' =>  $faker->realText($faker->numberBetween(10, 20)),
				'year' => rand(1998, 2010)
			]);
    	}
	}
}
