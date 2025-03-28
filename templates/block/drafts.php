<?php
require_once("header.php");
?>
<div class="row">
    <?php foreach ($drafts as $draft): ?>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="h5">Draft #<?= $draft->getId() ?></h2>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    
                    <!-- Image Pokémon + Types -->
                    <div class="text-center">
                        <img src="<?= $draft->getPokemon()->getImage() ?>" alt="<?= $draft->getPokemon()->getNameFr() ?>" class="img-fluid" style="max-width: 150px;">
                        <div class="pokemon-types mt-2">
                            <?php foreach ($draft->getPokemon()->getTypes() as $type): ?>
                                <img src="<?= $type->getImage() ?>" alt="<?= $type->getName() ?>" title="<?= $type->getName() ?>" style="max-width: 30px;">
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Infos Pokémon -->
                    <div class="text-center flex-grow-1 mx-3">
                        <h3><?= $draft->getPokemon()->getNameFr() ?></h3>
                        <p><strong>Catégorie:</strong> <?= $draft->getPokemon()->getCategory() ?></p>

                    </div>

                    <!-- Infos Draft -->
                    <div class="text-end">
                        <p><strong>Statut:</strong> <?= $draft->getStatus() ?></p>
                        <p><strong>Nombre de rounds:</strong> <?= count($draft->getEliminatedPokemons()) ?></p>
                        <?php if ($draft->getStatus() == "en cours"): ?>
                            <a href="index.php?action=pick&id=<?= $draft->getId() ?>" class="btn btn-primary">Poursuivre la draft</a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
require_once("footer.php");
?>
