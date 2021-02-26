<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('lang/{lang}', function (string $lang) {
    if (session()->has('language')) {
        session()->forget('language');
    }

    $lang = (in_array($lang, ['en', 'ar'])) ? $lang : config('app.locale');

    session()->put('language', $lang);

    return redirect()->back();
})
    ->name('lang')
    ->where('lang', '[ar,en]+');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Route::get('/recipe', [\App\Http\Controllers\Web\RecipeController::class, 'index'])->name('recipe.index');
//Route::get('/recipe', [\App\Http\Controllers\Web\RecipeController::class, 'store']);
//Route::post('/recipe/store', [\App\Http\Controllers\Web\RecipeController::class, 'store']);
Route::resource('recipe', \App\Http\Controllers\Web\RecipeController::class);
