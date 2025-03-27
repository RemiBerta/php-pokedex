<?php
namespace App\Manager;
use App\Model\Type;

class TypeManager extends DatabaseManager
{
    public function selectAll(): array
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM pokemon_type;");
        $requete->execute();

        $arrayTypes = $requete->fetchAll();
        $types = [];
        foreach ($arrayTypes as $arrayType) 
        {
            $types[] = new Type($arrayType["id"],$arrayType["name"],$arrayType["image"]);
        }
        return $types;
    }

    public function selectByID(int $id): Type|false
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM pokemon_type WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        $arrayType = $requete->fetch();

        
        if(!$arrayType) {

            return false;
        }
        return new Type($arrayType["id"],$arrayType["name"],$arrayType["image"]);
    }

    public function insertType(Type $type): bool
    {
        $requete = self::getConnexion()->prepare("INSERT INTO pokemon_type (name,image) VALUES (:name,:image);");

        $requete->execute([
            ":name" => $type->getName(),
            ":image" => $type->getImage(),
        ]);

        return $requete->rowCount() > 0;
    }

    public function updateByID(Type $type): bool
    {
        $requete = self::getConnexion()->prepare("UPDATE pokemon_type (name,image) VALUES (:name,:image);");

        $requete->execute([
            ":name" => $type->getName(),
            ":image" => $type->getImage(),
        ]);

        return $requete->rowCount() > 0;
    }

    public function deleteByID(int $id): bool
    {
        $requete = self::getConnexion()->prepare("DELETE FROM pokemon_type WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        return $requete->rowCount() > 0;
    }
}