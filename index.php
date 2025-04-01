<?php

require __DIR__ . "/vendor/autoload.php";
use App\Manager\DatabaseManager;
use App\Model\Pokemon;
use App\Model\Type;
use App\Manager\PokemonManager;
use App\Controller\HomeController;
use App\Controller\DraftController;

$pokemonManager = New PokemonManager();
$DraftController = new DraftController();
$homeController = new HomeController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}elseif ($action == "homePage"){
    $homeController->homePage();
} elseif($action == "draftPage"){
    $DraftController->draftPage();
} elseif($action == "startDraft"){
    $DraftController->startDraft();
} elseif($action == "pick"){
    $draftController->pickPokemon($id);
}  elseif($action == "confirm_pick"){
    $draftController->confirmPick($id);
} elseif($action == "drafts"){
    $homeController->drafts();
} else {  $action = 'homePage';
}
