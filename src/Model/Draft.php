<?php

namespace App\Model;

class Draft
{

    public function __construct(private ?int $id,private  Pokemon $pokemon,private  string $status,private array $eliminatedPokemons)
    {
        $this->id = $id;
        $this->pokemon = $pokemon;
        $this->status = $status;
        $this->eliminatedPokemons = $eliminatedPokemons;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }


    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of pokemon
     */ 
    public function getPokemon()
    {
        return $this->pokemon;
    }

    /**
     * Set the value of pokemon
     *
     * @return  self
     */ 
    public function setPokemon($pokemon)
    {
        $this->pokemon = $pokemon;

        return $this;
    }

    /**
     * Get the value of eliminatedPokemons
     */ 
    public function getEliminatedPokemons()
    {
        return $this->eliminatedPokemons;
    }

    /**
     * Set the value of eliminatedPokemons
     *
     * @return  self
     */ 
    public function setEliminatedPokemons($eliminatedPokemons)
    {
        $this->eliminatedPokemons = $eliminatedPokemons;

        return $this;
    }
}
