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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);    

    Route::get('/getLikedPokemon', [App\Http\Controllers\PokemonController::class, 'likedPokemon']);
    Route::get('/getHatePokemon',[App\Http\Controllers\PokemonController::class,'hatedPokemon']);

    Route::post('/setFavoritePokemon', [App\Http\Controllers\PokemonController::class, 'createFavoritePokemon']);
    Route::post('/setDislikePokemon', [App\Http\Controllers\PokemonController::class, 'createDislikePokemon']);


    Route::get('/usersPokemon',[App\Http\Controllers\PokemonController::class,'usersPokemon']);
    Route::post('/pokemonById',[App\Http\Controllers\PokemonController::class,'fetchPokemonById']);
    Route::post('/searchPokemon',[App\Http\Controllers\PokemonController::class,'searchPokemonByName']);
    Route::get('/allPokemon', [App\Http\Controllers\PokemonController::class,'fetchPokemonAPI']);




});


