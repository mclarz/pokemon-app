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


    public function searchPokemonByID($id) {

        try {
            $response =  Http::get($this->baseUrl, [
                'id' => $id
                ])->json();

            $this->response = [
                'success' => true,
                'result' => $response
            ];
            
        } catch (Exception $e) {

            $this->response =[
                'success' => false,
                'error' => $e->getMessage()
            ];
           
        }

        return response()->json($this->response);

    }

    public function all($offset = 10, $limit = 10) {


        try {

            $response =  Http::get($this->baseUrl, [
                'offset' => $offset,
                'limit' => $limit
            ])->json();

            $this->response = [
                'success' => true,
                'result' => $response
            ];
            
        } catch (Exception $e) {

            $this->response =[
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

}