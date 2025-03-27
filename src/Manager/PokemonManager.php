<?php

namespace App\Manager;

use App\Model\Pokemon;
use App\Model\Type;

class PokemonManager extends DatabaseManager
{
    public function selectAll(): array
    {
        $requete = self::getConnexion()->query("SELECT p.id, p.pokedexId, p.nameFr, p.category, p.image, p.imageShiny, GROUP_CONCAT(pt.id ORDER BY pt.id SEPARATOR ',') AS type_ids,GROUP_CONCAT(pt.name ORDER BY pt.id SEPARATOR ',') AS type_names, GROUP_CONCAT(pt.image ORDER BY pt.id SEPARATOR ',') AS type_images FROM pokemon p LEFT JOIN pokemon_type_relation ptr ON p.id = ptr.pokemon_id LEFT JOIN pokemon_type pt ON ptr.type_id = pt.id GROUP BY p.id;");
        $requete->execute();
        $arrayPokemons = $requete->fetchAll();
        $pokemons = [];
        foreach ($arrayPokemons as $arrayPokemon) {

            $newPokemon = new Pokemon($arrayPokemon["id"], $arrayPokemon["pokedexId"], $arrayPokemon["nameFr"], $arrayPokemon["category"], $arrayPokemon["image"], $arrayPokemon["imageShiny"] ?? "", []);

            if (!empty($arrayPokemon["type_ids"])) {
                $typeIds = explode(",", $arrayPokemon["type_ids"]);
                $typeNames = explode(",", $arrayPokemon["type_names"]);
                $typeImages = explode(",", $arrayPokemon["type_images"]);

                foreach ($typeIds as $index => $typeId) {
                    $type = new Type($typeId, $typeNames[$index], $typeImages[$index]);
                    $newPokemon->addType($type);
                }
            }

            $pokemons[] = $newPokemon;
        }
        return $pokemons;

    }
    public function selectByID(int $id): Pokemon|false
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM pokemon WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        $arrayPokemon = $requete->fetch();


        if (!$arrayPokemon) {

            return false;
        }
        //je dois mettre des objets de Type.php 
        // $type = new Type($array["typeId"], etc...)
        return new Pokemon($arrayPokemon["id"], $arrayPokemon["pokedexId"], $arrayPokemon["nameFr"], $arrayPokemon["category"], $arrayPokemon["image"], $arrayPokemon["imageShiny"], $arrayPokemon[""]);
    }

    public function insertPokemon(Pokemon $pokemon): bool
    {
        $requete = self::getConnexion()->prepare("INSERT INTO pokemon (pokedexId,nameFr,category,image, imageShiny) VALUES (:pokedexId,:nameFr,:category,:image, :imageShiny);");

        $requete->execute([
            ":pokedexId" => $pokemon->getpokedexId(),
            ":nameFr" => $pokemon->getNameFr(),
            ":category" => $pokemon->getCategory(),
            ":image" => $pokemon->getImage(),
            ":imageShiny" => $pokemon->getImageShiny()
        ]);

        return $requete->rowCount() > 0;
    }

    public function updateByID(Pokemon $pokemon): bool
    {
        $requete = self::getConnexion()->prepare("UPDATE pokemon SET pokedexId = :pokedexId, nameFr = :nameFr, category = :category, image = :image , imageShiny = :imageShiny WHERE id = :id;");
        $requete->execute(
            [
                ":pokedexId" => $pokemon->getpokedexId(),
                ":nameFr" => $pokemon->getNameFr(),
                ":category" => $pokemon->getCategory(),
                ":image" => $pokemon->getImage(),
                ":imageShiny" => $pokemon->getImageShiny()
            ]
        );

        return $requete->rowCount() > 0;
    }

    public function deleteByID(int $id): bool
    {
        $requete = self::getConnexion()->prepare("DELETE FROM pokemon WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        return $requete->rowCount() > 0;
    }
}
