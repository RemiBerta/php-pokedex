<?php
namespace App\Manager;
use App\Model\TypeRelation;

class TypeRelationManager extends DatabaseManager
{
    public function selectAll(): array
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM pokemon_type_relation;");
        $requete->execute();

        $arrayTypes = $requete->fetchAll();
        $typeRelations = [];
        foreach ($arrayTypes as $arrayType) 
        {
            $typeRelations[] = new TypeRelation($arrayType["id"],$arrayType["name"],$arrayType["image"]);
        }
        return $typeRelations;
    }

    public function selectByID(int $id): TypeRelation|false
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM pokemon_type_relation WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        $arrayType = $requete->fetch();

        
        if(!$arrayType) {

            return false;
        }
        return new TypeRelation($arrayType["pokemonId"],$arrayType["typeId"]);
    }
}
