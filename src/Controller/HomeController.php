<?php
namespace App\Controller;

use App\Manager\PokemonManager;
use App\Manager\DraftManager;

class HomeController{

    private PokemonManager $pokemonManager;
    private DraftManager $draftManager;

    public function __construct(){
        $this->pokemonManager = new PokemonManager();

    
    }

    public function homePage(){
      $pokemons = $this->pokemonManager->selectAll();
        require_once("./templates/homePage.php");
    }

    public function drafts() {
        $drafts = $this->draftManager->selectAll();
        require_once("./templates/draftPage.php");
    }
}