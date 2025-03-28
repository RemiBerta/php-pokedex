<?php

namespace App\Manager;

use App\Model\Draft;
use App\Model\Pokemon;


class DraftManager extends DatabaseManager
{

    public function selectById(int $id): Draft|false
    {
        $reponse = self::getConnexion()->prepare($this->getBaseQuery() . ' HAVING d.id = :id;');
        $reponse->execute([
            ":id" => $id
        ]);
        $arrayDraft = $reponse->fetch();

        if (!$arrayDraft) {
            return false;
        }
        
        return $this->arrayToObject($arrayDraft);
    }

    public function selectAll(): array
    {
        $reponse = self::getConnexion()->query($this->getBaseQuery());
        $arrayDrafts = $reponse->fetchAll();
        $objectDrafts = [];

        foreach ($arrayDrafts as $arrayDraft) {
            $objectDrafts[] = $this->arrayToObject($arrayDraft);
        }

        return $objectDrafts;
    }

    public function insert(Draft $draft): int
    {
        $requete = self::getConnexion()->prepare("INSERT INTO draft (selected_pokemon_id,status) VALUES (:selectedPokemonId,:status);");

        $requete->execute([
            "selectedPokemonId" => $draft->getPokemon()->getId(),
            "status" => $draft->getStatus()
        ]);

        return self::getConnexion()->lastInsertId();
    }

    public function update(Draft $draft): bool
    {
        $requete = self::getConnexion()->prepare("UPDATE draft SET selected_pokemon_id = :selectedPokemonId, status = :status WHERE id = :id;");

        $requete->execute([
            "selectedPokemonId" => $draft->getPokemon()->getId(),
            "status" => $draft->getStatus(),
            "id" => $draft->getId()
        ]);
        return $requete->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $requete = self::getConnexion()->prepare("DELETE FROM draft WHERE id = :id;");

        $requete->execute([
            "id" => $id
        ]);
        return $requete->rowCount() > 0;
    }

    private function getBaseQuery(): string
    {
        return "SELECT 
    d.id AS id,
    d.selected_pokemon_id,
    d.status,
    d.created_at,
    COALESCE(JSON_ARRAYAGG(de.pokemon_id), '[]') AS eliminated_pokemon_ids
FROM draft d
LEFT JOIN draft_eliminations de ON d.id = de.draft_id
GROUP BY d.id";
    }

    private function arrayToObject(array $arrayDraft): Draft
    {
        $pokemonManager = new PokemonManager();
        $pokemon = $pokemonManager->selectById($arrayDraft["selected_pokemon_id"]);
        $eliminatedPokemons = [];
        $eliminatedPokemonIds = json_decode($arrayDraft['eliminated_pokemon_ids'], true);

        return new Draft(
            $arrayDraft["id"],
            $pokemon,
            $arrayDraft["status"],
            $eliminatedPokemonIds
        );
    }
}
