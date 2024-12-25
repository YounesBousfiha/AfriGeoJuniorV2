<?php

class Country {

    private $name;
    private $population;

    function __construct($name, $population)
    {
        $this->name = $name;
        $this->population = $population;
    }

    function getName() {
        return $this->name;
    }

    function setName($newName) {
        return $this->name = $newName;
    }

    function getPopulation() {
        return $this->population;
    }

    function setPopulation($newPopulation) {
        $this->population = $newPopulation;
    }

}

?>