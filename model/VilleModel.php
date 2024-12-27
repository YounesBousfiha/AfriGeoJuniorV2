<?php


class Ville {

    private $ville_nom;
    private $ville_description;
    private $ville_type;
    private $ville_image;
    private $id_pays;
    private $created_by;

    function __construct($ville_nom, $ville_description, $ville_type, $ville_image, $id_pays, $created_by) {
        $this->ville_nom = $ville_nom;
        $this->description = $ville_description;
        $this->type_ville = $ville_type;
        $this->ville_image = $ville_image;
        $this->id_pays = $id_pays;
        $this->created_by = $created_by;
    }

    public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->$property = $value;
    } 
}

?>