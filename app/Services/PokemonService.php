<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PokemonService {

    
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
        $user = Auth::user();
        $result = app('App\Repositories\PokemonRepository')->userPokemonLists($user->id);
        $data = [];
        
        if ($result) {
            foreach ($result as $res) {
                $data[$res->id]['name'] = $res->name;
                foreach ($res->pokemon as $pokemon) {
                    if ($pokemon->status == 0) {
                        $data[$res->id]['hated'][] = $pokemon;
                    } else {
                        $data[$res->id]['favorite'][] = $pokemon;
                    }
                }
            }
        }
        return $data;
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