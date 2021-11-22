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
            $data = [];
            foreach ($likedPokemon as $pokemon) {
                $pokeId = $pokemon->pokemon_id;
                $apiService = new PokemonAPI();
                $apiResult = $apiService->searchPokemonByIDorName($pokeId);
                if ($apiResult) {
                    $data[] = $apiResult['forms'][0];
                }
            }

            $this->response = [
                'success' => true,
                'result' => $data
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
            $data = [];
            foreach ($hatedPokemon as $pokemon) {
                $pokeId = $pokemon->pokemon_id;
                $apiService = new PokemonAPI();
                $apiResult = $apiService->searchPokemonByIDorName($pokeId);
                if ($apiResult) {
                    $data[] = $apiResult['forms'][0];
                }
            }

            $this->response = [
                'success' => true,
                'result' => $data
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
     * Add favorite pokemon
     *
     * @param  App/Services/PokemonService $pokemonService
     * @param  Request $request
     * @return void
     */
    public function createFavoritePokemon(PokemonService $pokemonService, Request $request)
    {
        try {
            
            $createFavorite = $pokemonService->createFavoritePokemon($request->pokemon_id);
            if (!$createFavorite) {
                $this->response = [
                    'success' => false,
                    'error' => 'You can only select up to 3 pokemons that are not exist.'
                ];    
            } else {
                $this->response = [
                    'success' => $createFavorite,
                ];
            }
        } catch (Exception $e) {
            $this->response = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($this->response);
    }
    
    /**
     * Create hated pokemon
     *
     * @param  App/Services/PokemonService $pokemonService
     * @param  Request $request
     * @return void
     */
    public function createDislikePokemon(PokemonService $pokemonService, Request $request)
    {
        try {
            $createDislike = $pokemonService->createDislikePokemon($request->pokemon_id);
            if (!$createDislike) {
                $this->response = [
                    'success' => false,
                    'error' => 'You can only select 1 to 3 pokemons that are not exist.'
                ];    
            } else {
                $this->response = [
                    'success' => $createDislike,
                ];
            }
        } catch (Exception $e) {
            $this->response = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($this->response);
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
            $pokemon = $pokemonService->userPokemonLists();
            $this->response = [
                'success' => true,
                'result' => $pokemon
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
