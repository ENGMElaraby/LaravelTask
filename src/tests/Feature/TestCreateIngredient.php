<?php

namespace Tests\Feature;

use Illuminate\Support\Arr;
use Tests\TestCase;
use Faker\Factory as Faker;

class TestCreateIngredient extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_ingredient()
    {
        $faker = Faker::create();
        $ingredient = [
            'name' => substr($faker->name,0,20),
            'measure' => Arr::random(['g', 'kg', 'pieces']),
            'supplier' => substr($faker->name,0,20)
        ];

        $response = $this->post('/ingredients/store', $ingredient);

        $response->assertStatus(200);
    }
}
