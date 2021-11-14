<?php

namespace App\Services;

use App\Models\User;
use PokemonRepository;

class PokemonService {

    protected $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getLikedPokemon()
    {
        return (new PokemonRepository)->getLikedPokemon($this->user->id);
    }

    public function getHatedPokemon()
    {
        return (new PokemonRepository)->getHatedPokemon($this->user->id);
    }

    public function userPokemonLists()
    {
        return (new PokemonRepository)->userPokemonLists($this->user->id);
    }
}