<?php
require_once("block/header.php");

?>
<h1 class="text-center p-5 m-5">Bienvenue sur le plus beau Pokedex ever</h1>
<div class="d-flex flex-wrap justify-content-evenly text-center">
<?php foreach ($pokemons as $pokemon) { ?>
    <div class="col-3 m-4 justify-content-center p-2 border ">
            <img src="<?= $pokemon->getImage() ?>" alt="<?= $pokemon->getNameFr() ?>" style="height: 200px; width: auto;">
            <img src="<?= $pokemon->getImageShiny() ?>" alt="<?= $pokemon->getNameFr() ?>" style="height: 200px; width: auto;">
           <p> <?= $pokemon->getCategory() ?> </p> <p><?="N°" . $pokemon->getPokedexId() . " du pokédex" ?></p>
            <div class="p-2">
                <h2><?= $pokemon->getNamefr() ?></h2>
                <?php foreach ($pokemon->getTypes() as $pokemonType) { ?>
                    <img src="<?= $pokemonType->getImage() ?>" alt="<?= $pokemonType->getName() ?>" style="height: 35px; width: auto;">
                    
                <?php  }
                ?>
            </div>
    </div>

<?php } ?>
 
</div>

<?php
require_once("block/footer.php");