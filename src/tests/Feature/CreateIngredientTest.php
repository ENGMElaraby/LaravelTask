<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Tests\TestCase;

class CreateIngredientTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_ingredient()
    {
        $response = $this->json('get', '/api/ingredients', [], ['Accept' => 'application/json']);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'status' => 200,
                'message' => "list all",
                'data' => [
                    'resource' => [
                        '*' => [
                            "id",
                            "name",
                            "measure",
                            "supplier",
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
    public function test_create_ingredient()
    {
        $payload = [
            'name' => substr($this->faker->name, 0, 20),
            'measure' => Arr::random(['g', 'kg', 'pieces']),
            'supplier' => substr($this->faker->name, 0, 20)
        ];

        $response = $this->post('/api/ingredients/store', $payload);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status' => Response::HTTP_OK,
            ]);
    }
}
