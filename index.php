<?php

require __DIR__ . "/vendor/autoload.php";
use App\Manager\DatabaseManager;
use App\Model\Pokemon;
use App\Model\Type;
use App\Manager\PokemonManager;
use App\Controller\HomeController;
use App\Controller\FavPickerController;

$pokemonManager = New PokemonManager();

if (isset($_GET['action'])) {

    $action = $_GET['action'];
    
} else {
		
    $action = 'homePage';
}

if($action == "homePage"){
    $homeController = new HomeController();
    $homeController->homePage();
} 

if($action == "favPicker"){
    $FavPickerController = new FavPickerController();
    $FavPickerController->favPicker();
} 
