<?php
require_once("block/header.php");

?>
<h1 class="text-center p-5 m-5">NeonPokedex</h1>
<div class="d-flex flex-wrap justify-content-evenly text-center">
    <?php foreach ($pokemons as $pokemon) { ?>
        <div class="col-3 m-4 justify-content-center p-2  pokeCard">
            <div style="position:relative">
                <img class="image1" src="<?= $pokemon->getImageShiny() ?>" alt="<?= $pokemon->getNameFr() ?>" style="height: 12em; width: auto;">
                <img class="image2" src="<?= $pokemon->getImage() ?>" alt="<?= $pokemon->getNameFr() ?>" style="height: 12em; width: auto;">
            </div>
            <p> <?= $pokemon->getCategory() ?> </p>
            <p><?= "N°" . $pokemon->getPokedexId() . " du pokédex" ?></p>
            <div >
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
