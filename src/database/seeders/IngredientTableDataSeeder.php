<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class IngredientTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,50) as $index) {
            DB::table('ingredients')->insert([
                'name' => substr($faker->name,0,20),
                'measure' => Arr::random(['g', 'kg', 'pieces']),
                'supplier' => substr($faker->name,0,20)
            ]);
        }
    }
}
