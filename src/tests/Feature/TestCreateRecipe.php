<?php

namespace Tests\Feature;

use Illuminate\Support\Arr;
use Tests\TestCase;
use Faker\Factory as Faker;

class TestCreateRecipe extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_ingredient()
    {
        $faker = Faker::create();
        $recipe = [
            'name' => substr($faker->name,0,20),
            'description' => $faker->address
        ];

        $response = $this->post('/recipe/store', $recipe);

        $response->assertStatus(200);
    }
}
