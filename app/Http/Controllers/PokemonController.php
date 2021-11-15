<?php

namespace App\Http\Controllers;

use App\Services\PokemonAPI;
use App\Services\PokemonService;
use Exception;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
        
    /**
     * response
     * @var array
     */
    public $response;

    
    /**
     * Fetch Pokemon from PokeAPI
     *
     * @param  App/Services/PokemonAPI $pokemonAPI
     * @return json
     */
    public function fetchPokemonAPI(PokemonAPI $pokemonAPI)
    {
        try {
            $apiResult = $pokemonAPI->all();
            $this->response = [
                'success' => true,
                'result' => $apiResult
            ];

        } catch (Exception $e) {
            $this->response = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($this->response);
    }

    /**
     * Fetch Pokemon by ID from PokeAPI
     *
     * @param  App/Services/PokemonAPI $pokemonAPI
     * @return json
     */
    public function fetchPokemonById(PokemonAPI $pokemonAPI , Request $request)
    {
        try {
            $apiResult = $pokemonAPI->searchPokemonByIDorName($request->pokemon_id);
            $this->response = [
                'success' => true,
                'result' => $apiResult
            ];

        } catch (Exception $e) {
            $this->response = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($this->response);
    }
    
    /**
     * Search pokemon by Name
     *
     * @param  mixed $pokemonAPI
     * @param  mixed $request
     * @return void
     */
    public function searchPokemonByName(PokemonAPI $pokemonAPI, Request $request)
    {
        try {
            $apiResult = $pokemonAPI->searchPokemonByIDorName($request->pokemon_name);
            $this->response = [
                'success' => true,
                'result' => $apiResult
            ];

        } catch (Exception $e) {
            $this->response = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($this->response);
    }
    
    
    /**
     * Fetch liked Pokemon
     *
     * @param  App/Services/PokemonService $pokemonService
     * @return json
     */
    public function likedPokemon(PokemonService $pokemonService)
    {
        try {
            $likedPokemon = $pokemonService->getLikedPokemon();
            $this->response = [
                'success' => true,
                'result' => $likedPokemon
            ];

        } catch (Exception $e) {

            $this->response = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($this->response);
    }
    
    /**
     * Fetch hated pokemon
     *
     * @param  App/Services/PokemonService $pokemonService
     * @return json
     */
    public function hatedPokemon(PokemonService $pokemonService)
    {
        try {
            $hatedPokemon = $pokemonService->getHatedPokemon();
            $this->response = [
                'success' => true,
                'result' => $hatedPokemon
            ];

        } catch (Exception $e) {

            $this->response = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($this->response);
    }

    public function selectLikedPokemon()
    {

    }

    public function selectHatePokemon()
    {

    }
    
    /**
     * Fetch all pokemon of all user
     *
     * @param  App/Services/PokemonService $pokemonService
     * @return void
     */
    public function userPokemonList(PokemonService $pokemonService)
    {

        try {
            $hatedPokemon = $pokemonService->getHatedPokemon();
            $this->response = [
                'success' => true,
                'result' => $hatedPokemon
            ];

        } catch (Exception $e) {

            $this->response = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($this->response);
    }
    
}
