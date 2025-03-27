<?php
namespace App\Controller;

use App\Manager\PokemonManager;

class HomeController{

    private PokemonManager $pokemonManager;

    public function __construct(){
        $this->pokemonManager = new PokemonManager();

    
    }

    public function homePage(){
      $pokemons = $this->pokemonManager->selectAll();
        require_once("./templates/homePage.php");
    }

    
}