<?php
namespace App\Controller;

use App\Manager\PokemonManager;
use App\Manager\DraftManager;
use App\Model\Pokemon;
use App\Model\Draft;

class DraftController{

    private PokemonManager $pokemonManager;
    private DraftManager $draftManager;
    

    public function __construct(){
        $this->pokemonManager = new PokemonManager();

        

    }

    public function draftPage(){
      $pokemons = $this->pokemonManager->selectAll();
        require_once("./templates/drafts.php");
    }


    public function startDraft(){

        $this->draftManager = new DraftManager();
         // sélectionne un poke random
        $randomPokemon = $this->pokemonManager->selectRandomPokemon();
        // créer une draft (choisir UN pokemon) et envoi son ID dans pick pokemon et remplir la BDD (insert)
        $newDraft = new Draft(null , $randomPokemon, "en cours", []);
        $draftId= $this->draftManager->insert($newDraft);
        // redirige vers l'écran sélection du Pokémon
        header("Location: index.php?action=pick&id=");
    }

    public function pickPokemon($id){
        var_dump($id);
        // Récupère le Pokémon actuel de la draft
        // Récupère les Pokémon déjà éliminés et ajoute celui actuellement sélectionné
        // Sélectionne un Pokémon aléatoire qui n'a pas encore été éliminé
        // Récupère la draft à partir de son ID
        // Charge la vue pour afficher le choix du Pokémon


    }

    public function confirmPick($id){
        // mets a jour la draft, elimine le pokemon et ramene de nouveau a pickPokemon en envoyant l'id de la draft


    }



//     $draftController->startDraft();
//     break;
// case 'pick':
//     $draftController->pickPokemon($id);
//     break;
// case 'confirm_pick':
//     $draftController->confirmPick($id);
//     break;
// case 'drafts':
//     $homeController->drafts();
//     break;
}
