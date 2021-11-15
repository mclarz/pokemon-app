<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::get('/getLikedPokemon', [App\Http\Controllers\PokemonController::class, 'likedPokemon']);
Route::get('/getHatePokemon',[App\Http\Controllers\PokemonController::class,'hatedPokemon']);
Route::get('/usersPokemon',[App\Http\Controllers\PokemonController::class,'usersPokemon']);
Route::post('/pokemonById',[App\Http\Controllers\PokemonController::class,'fetchPokemonById']);
Route::post('/searchPokemon',[App\Http\Controllers\PokemonController::class,'searchPokemonByName']);
Route::get('/allPokemon', [App\Http\Controllers\PokemonController::class,'fetchPokemonAPI']);
