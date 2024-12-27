<?php

class Pays {
    private $pays_id;
    private $pays_nom;
    private $pays_population;
    private $pays_image;
    private $id_continent;
    private $created_by;

    function __construct($pays_nom, $pays_population, $pays_image, $id_continent, $created_by)
    {
        $this->pays_nom = $pays_nom;
        $this->pays_population = $pays_population;
        $this->pays_image = $pays_image;
        $this->id_continent = $id_continent;
        $this->created_by = $created_by;
    }

    public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }
}

// 
?>