<?php

namespace App\Manager;

class DraftEliminationsManager extends DatabaseManager
{

    public function insert(int $draftId, int $pokemonId): bool
    {
        
        $requete = self::getConnexion()->prepare("INSERT INTO draft_eliminations (draft_id, pokemon_id) VALUES (:draft_id, :pokemon_id)");
        
        return $requete->execute([
            'draft_id' => $draftId,
            'pokemon_id' => $pokemonId
        ]);
    }
}
