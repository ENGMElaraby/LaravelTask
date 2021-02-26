<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Tests\TestCase;
use Faker\Factory as Faker;

class CreateRecipeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_recipe()
    {
        $response = $this->json('get', '/api/recipe', [], ['Accept' => 'application/json']);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'status' => 200,
                'message' => "list all",
                'data' => [
                    'resource' => [
                        '*' => [
                            "id",
                            "name",
                            "description"
                        ]
                    ],
                    "pagination" => [
                        "total",
                        "count",
                        "per_page",
                        "current_page",
                        "last_page",
                        "has_more_pages",
                    ]
                ],
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_recipe()
    {
        $faker = Faker::create();
        $recipe = [
            'name' => substr($faker->name,0,20),
            'description' => $faker->address
        ];

        $response = $this->post('/api/recipe/store', $recipe);

        $response->assertStatus(200);
    }
}
