<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class PokemonAPI {

    /**
     *
     * @var URL
     */
    private $baseUrl = 'https://pokeapi.co/api/v2/pokemon/';

    /**
     *
     * @var array
     */
    public $response;


    public function searchPokemonByIDorName($id)
    {
        try {
           return Http::get($this->baseUrl.$id)->json();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

    public function all($offset = 0, $limit = 10)
    {

        try {
           return  Http::get($this->baseUrl, [
                'offset' => $offset,
                'limit' => $limit
            ])->json();
            
        } catch (Exception $e) {
           throw new Exception($e->getMessage());
        }
    }

}