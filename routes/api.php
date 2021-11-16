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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::post('/pokemonById',[App\Http\Controllers\PokemonController::class,'fetchPokemonById']);
Route::post('/searchPokemon',[App\Http\Controllers\PokemonController::class,'searchPokemonByName']);
Route::get('/allPokemon', [App\Http\Controllers\PokemonController::class,'fetchPokemonAPI']);
