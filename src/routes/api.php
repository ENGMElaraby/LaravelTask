<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/ingredients', [\App\Http\Controllers\API\IngredientController::class, 'index']);
Route::post('/ingredients/store', [\App\Http\Controllers\API\IngredientController::class, 'store']);
Route::get('/recipe', [\App\Http\Controllers\API\RecipeController::class, 'index']);
Route::post('/recipe/store', [\App\Http\Controllers\API\RecipeController::class, 'store']);
Route::post('/box/store', [\App\Http\Controllers\API\BoxController::class, 'store']);
