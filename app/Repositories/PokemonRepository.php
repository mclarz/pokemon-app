<?php
namespace App\Repositories;
use App\Models\Pokemon;

class PokemonRepository {


    protected $model;

    
    /**
     *
     * @param  mixed $userId
     * @return void
     */
    public function getLikedPokemon($userId)
    {
        return Pokemon::where('user_id', $userId)->where('status',1)->get();
    }
    
    /**
     *
     * @param  mixed $userId
     * @return void
     */
    public function getHatedPokemon($userId)
    {

    return Pokemon::where('user_id', $userId)->where('status',0)->get();

    }
    
    /**
     *
     * @param  mixed $userId
     * @return void
     */
    public function userPokemonLists($userId)
    {
        return Pokemon::where('user_id','<>', $userId)->get();

    }
    
    /**
     *
     * @param  mixed $pokemonId
     * @param  mixed $userId
     * @return void
     */
    public function createFavoritePokemon($pokemonId, $userId)
    {
        $model = new Pokemon();
        $checkFavorite = $model->where('pokemon_id', $pokemonId)
                                ->where('user_id', $userId)
                                ->where('status', 1)
                                ->count();

        if ($checkFavorite < 3) {

            return $model->create([
                'pokemon_id'    => $pokemonId,
                'user_id'       => $userId,
                'status'        => 1,
            ]);

        }

        return false;
    }
    
    /**
     *
     * @param  mixed $pokemonId
     * @param  mixed $userId
     * @return void
     */
    public function createDislikePokemon($pokemonId, $userId)
    {
        $model = new Pokemon();
        $checkDislike = $model->where('pokemon_id', $pokemonId)
                                ->where('user_id', $userId)
                                ->where('status', 0)
                                ->count();
        if ($checkDislike < 3) {
            return $model->create([
                'pokemon_id'    => $pokemonId,
                'user_id'       => $userId,
                'status'        => 0,
            ]);
        }
        return false;
    }
}