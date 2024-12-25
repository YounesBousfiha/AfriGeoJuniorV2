<?php

class CountryController {

    private $db;

    function    __construct($db)
    {
        $this->db = $db->conn;
    }

    function create($name, $population)
    {
        $sql = "INSERT INTO Country (Nom, Population) VALUES (:Nom, :Population)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':Nom', $name);
            $stm->bindValue(':Population', $population);
            if($stm->execute()) {
                echo "Added Success";
            }
            
        } catch (Exception $e) 
        {
            echo "Error : " . $e->getMessage();
        }


    }
}

?>