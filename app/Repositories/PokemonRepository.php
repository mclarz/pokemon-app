<?php
namespace App\Repositories;
use App\Models\Pokemon;
use App\Models\User;

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
        return User::with(['pokemon'])->where('id','<>',$userId)->get();

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
        $checkFavorite = $model->where('user_id', $userId)
                                ->where('status', 1)
                                ->get();

        if (in_array($pokemonId, $checkFavorite->pluck('pokemon_id')->toArray())) return false;
        if (count($checkFavorite) >= 3) return false;


        $model->create([
            'pokemon_id'    => $pokemonId,
            'user_id'       => $userId,
            'status'        => 1,
        ]);
        return true;

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
        $checkDislike = $model->where('user_id', $userId)
                                ->where('status', 0)
                                ->get();
                                
        if (in_array($pokemonId, $checkDislike->pluck('pokemon_id')->toArray())) return false; 
        if (count($checkDislike) >= 3)  return false;
        

        
        $model->create([
            'pokemon_id'    => $pokemonId,
            'user_id'       => $userId,
            'status'        => 0,
        ]);

        return true;
    }
}