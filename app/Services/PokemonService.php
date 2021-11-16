<?php

namespace App\Services;

use App\Models\User;
use  App\Repositories\PokemonRepository as PokemonRepository;
use Illuminate\Support\Facades\Auth;

class PokemonService {

    protected $user;
    
    public function getLikedPokemon()
    {
        $userId = Auth::user()->id;
        return app('App\Repositories\PokemonRepository')->getLikedPokemon($userId);
    }

    public function getHatedPokemon()
    {
        $userId = Auth::user()->id;
        return app('App\Repositories\PokemonRepository')->getHatedPokemon($userId);
    }

    public function userPokemonLists()
    {
        $userId = Auth::user()->id;
        return app('App\Repositories\PokemonRepository')->userPokemonLists($userId);
    }

    public function createFavoritePokemon($pokemonId)
    {
        $userId = Auth::user()->id;
        return app('App\Repositories\PokemonRepository')->createFavoritePokemon($pokemonId,$userId);
    }

    public function createDislikePokemon($pokemonId)
    {
        $userId = Auth::user()->id;
        return app('App\Repositories\PokemonRepository')->createDislikePokemon($pokemonId,$userId);
    }
}