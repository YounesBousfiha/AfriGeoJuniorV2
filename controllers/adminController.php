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

    public function countUsers(){
        $sql = "SELECT COUNT(*) as count_users FROM Users";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function countContinents(){
        $sql = "SELECT COUNT(*) as count_continents FROM Continents";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function countCountries(){
        $sql = "SELECT COUNT(*) as count_countries FROM Pays";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function countCities(){
        $sql = "SELECT COUNT(*) as count_cities FROM Villes";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function CountVillesInPays() {
        $sql = "SELECT Pays.Nom_pays, COUNT(*) FROM Villes, Pays WHERE Pays.Id_pays = Villes.Id_pays GROUP BY Pays.Nom_pays";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function CountPaysPerContinent() {
        $sql = "SELECT Continents.Continent_name, count(*) FROM Continents, Pays WHERE Continents.Id_continent = Pays.Id_continent GROUP BY Continents.Continent_name";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function CountPopulationPerContinent() {
        $sql = "SELECT Continents.Continent_name, SUM(Population) AS 'Population' FROM Continents, Pays WHERE Continents.Id_continent = Pays.Id_continent GROUP BY Continents.Continent_name";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function GetMaxPopulation() {
        $sql = "SELECT * FROM Pays WHERE Population = (SELECT MAX(Population) FROM Pays)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


?>