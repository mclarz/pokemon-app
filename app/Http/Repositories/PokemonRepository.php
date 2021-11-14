<?php

use App\Models\Pokemon;

class PokemonRepository {


    public function getLikedPokemon($userId)
    {
        return Pokemon::where('user_id', $userId)->where('status',1)->get();
    }

    public function getHatedPokemon($userId)
    {

    return Pokemon::where('user_id', $userId)->where('status',0)->get();

    }

    public function userPokemonLists($userId)
    {
        return Pokemon::where('user_id','<>', $userId)->get();

    }
}