<?php

class Continent
{
    private $continent_nom;
    private $created_by;

    public function __construct($continent_nom, $created_by)
    {
        $this->continent_nom = $continent_nom;
        $this->created_by = $created_by;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        $this->$property = $value;
    }
}
