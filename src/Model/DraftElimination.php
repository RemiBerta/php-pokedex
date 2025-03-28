<?php

namespace App\Model;

class Draft
{

    public function __construct(private ?int $id,private int $pokemonId,private  int $draftId)
    {
        $this->id = $id;
        $this->pokemonId = $pokemonId;
        $this->draftId = $draftId;
    }

    public function getId(): int
    {
        return $this->id;
    }


    /**
     * Get the value of pokemonId
     */ 
    public function getPokemonId()
    {
        return $this->pokemonId;
    }

    /**
     * Set the value of pokemonId
     *
     * @return  self
     */ 
    public function setPokemonId($pokemonId)
    {
        $this->pokemonId = $pokemonId;

        return $this;
    }

    /**
     * Get the value of draftId
     */ 
    public function getDraftId()
    {
        return $this->draftId;
    }

    /**
     * Set the value of draftId
     *
     * @return  self
     */ 
    public function setDraftId($draftId)
    {
        $this->draftId = $draftId;

        return $this;
    }
}
