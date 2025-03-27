<?php

namespace App\Model;

class TypeRelation
{

    public function __construct(private int|null $pokemonId, private string $typeId)
    {
        $this->pokemonId = $pokemonId;
        $this->typeId = $typeId;
    }

    public function getPokemonId()
    {
        return $this->pokemonId;
    }

    public function setPokemonId($pokemonId)
    {
        $this->pokemonId = $pokemonId;
    }

    public function getTypeId()
    {
        return $this->typeId;
    }

    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    }
}
