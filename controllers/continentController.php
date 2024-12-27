<?php

trait ContinentController {

    public function createContinent($continent_name, $createdby) {
        $sql = "INSERT INTO Continents(Continent_name, Created_by)
                VALUES (:Continent_name, :Created_by)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':Continent_name', $continent_name);
            $stm->bindValue(':Created_by', $createdby);
            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateContinent($id, $continent_name) {
        $sql = "UPDATE Continents SET Continent_name = :Continent_name WHERE Id_continent = :Id_continent";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':Id_continent', $id);
            $stm->bindValue(':Continent_name', $continent_name);
            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteContinent($id) {
        $sql = "DELETE FROM Continents WHERE Id_continent = :Id_continent";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':Id_continent', $id);
            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getByIdContinent($id) {
        $sql = "SELECT * FROM Continents WHERE Id_continent = :Id_continent";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':Id_continent', $id);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllContinent() {
        $sql = "SELECT * FROM Continents";
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