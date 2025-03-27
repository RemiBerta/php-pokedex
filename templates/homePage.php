<?php
use App\Manager\PokemonManager;
require_once("block/header.php");
$pokemonManager = new PokemonManager;
$pokemons= $pokemonManager->selectAll();
?>
<h1 class="text-center">Bienvenue sur le plus beau Pokedex ever</h1>
<div class="col-4 d-flex p-3 justify-content-center">
<?php foreach ($pokemons as $pokemon){ ?>
            <img src="images/<?= $pokemon->getImage() ?>" alt="<?= $pokemon->getNameFr() ?>" style="height: 200px; width: auto;">
            <div class="p-2">
                <h2><?= $pokemon->getNamefr() ?></h2>
                <p><?= $pokemon->getTypes() ?>, <?= $pokemon->getCategory() ?> <?= $pokemon->getPokedexId() ?></p>
            </div>
        </div>
        <?php }?>

        <!-- je vais devoir faire une boucle pour afficher les types et leur images -->