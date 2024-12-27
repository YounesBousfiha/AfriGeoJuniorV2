<?php


class Ville {

    private $Nom;
    private $Description;
    private $Type_ville;
    private $Id_pays;
    private $created_by;

    function __construct($Nom, $Description, $Type_ville, $Id_pays, $created_by) {
        $this->Nom = $Nom;
        $this->Description = $Description;
        $this->Type_ville = $Type_ville;
        $this->Id_pays = $Id_pays;
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