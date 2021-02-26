<?php

namespace Tests;

use Faker\Factory;
use Illuminate\{Foundation\Testing\DatabaseMigrations,
    Foundation\Testing\TestCase as BaseTestCase,
    Support\Facades\Artisan};

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    protected $faker;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
        Artisan::call('config:clear');
    }

}
