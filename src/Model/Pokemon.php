<?php
namespace App\Model;

class Pokemon
{
public function __construct(private int|null $id, private string $pokedexId, private string $nameFr, private string $category, private string $image, private string $imageShiny, private array $types)
{
    $this->id = $id;
    $this->pokedexId = $pokedexId;
    $this->nameFr = $nameFr;
    $this->category = $category;
    $this->image = $image;
    $this->imageShiny = $imageShiny;
    $this->types = $types;
}
// il me faut un array types pour getType 
public function getId()
{
    return $this->id;
}

public function setId($id)
{
    $this->id = $id;
}

public function getPokedexId()
{
    return $this->pokedexId;
}

public function setPokedexId($pokedexId)
{
    $this->pokedexId = $pokedexId;
}

public function getNameFr()
{
    return $this->nameFr;
}

public function setNameFr($nameFr)
{
    $this->nameFr = $nameFr;
}

public function getCategory()
{
    return $this->category;
}

public function setCategory($category)
{
    $this->category = $category;
}


public function getImage()
{
    return $this->image;
}

public function setImage($image)
{
    $this->image = $image;
}


public function getImageShiny()
{
    return $this->imageShiny;
}

public function setImageShiny($imageShiny)
{
    $this->imageShiny = $imageShiny;
}

public function getTypes()
{
    return $this->types;
}

public function setTypes($types)
{
    $this->types = $types;
}

public function addType(Type $type) 
{
    $this->types[] = $type;
}
}

