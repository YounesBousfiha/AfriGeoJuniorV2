<?php

include 'PersonController.php';

class AdminController extends PersonController {
    use ContinentController, PaysController, VilleController;


    private $continent;
    private $pays;
    private $ville;
    private $db;

    public function __construct($db, $continent = null, $pays = null, $ville = null){
        $this->db = $db;
        $this->continent = $continent;
        $this->pays = $pays;
        $this->ville = $ville;
    }

    // with the Using of the traits , Admin have now Access to All CRUD Contient , Pays , Ville

}


?>