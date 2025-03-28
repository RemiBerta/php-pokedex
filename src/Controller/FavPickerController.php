<?php
namespace App\Controller;

use App\Manager\PokemonManager;

class FavPickerController{

    private PokemonManager $pokemonManager;

    public function __construct(){
        $this->pokemonManager = new PokemonManager();

        

    }

    public function favPicker(){
      $pokemons = $this->pokemonManager->selectAll();
        require_once("./templates/favPickerPage.php");
    }

    
}

// Sur cette page je vais générer et afficher deux pokemons aléatoirement et en choisir un que je prefere, le garder et 
// supprimer l'autre pour en générer un nouveau au pif
// il me faut : une méthode qui va chercher deux poké au pif, on peut utiliser le selectbyID existant en générant une id random
// il me faut : une méthode qui récupere le pokemon  fav et l'envoi au prochain tour
// il me faut : une méthode qui va venir remplacer celui éliminé par un autre poké au pif, on recycle et change quelques trucs sur la méthode plus haut
// probleme : où vont les pokemons éliminés ? si non on pourrait retomber sur le meme poké plusieur fois
// draft : nouvelle page 