<?php

trait PaysController {
    
    public function createPays($countryInstance) {
        $sql = "INSERT INTO Pays(Nom_pays, Population, Id_continent, Created_by, Image)
                VALUES (:Nom_pays, :Population, :Id_continent, :Created_by, :Image)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':Nom_pays', $countryInstance->__get('pays_nom'));
            $stm->bindValue(':Population', $countryInstance->__get('pays_population'));
            $stm->bindValue(':Id_continent', $countryInstance->__get('id_continent'));
            $stm->bindValue(':Created_by', $countryInstance->__get('created_by'));
            $stm->bindValue(':Image', $countryInstance->__get('pays_image'));
            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updatePays($id, $name, $population, $id_continent, $image) {
        $sql = "UPDATE Pays SET Nom_pays = :Nom_pays, Population = :Population, Id_continent = :Id_continent, Image = :Image WHERE Id_pays = :Id_pays";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':Id_pays', $id);
            $stm->bindValue(':Nom_pays', $name);
            $stm->bindValue(':Population', $population);
            $stm->bindValue(':Id_continent', $id_continent);
            $stm->bindValue(':Image', $image);
            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deletePays($id) {
        $sql = "DELETE FROM Pays WHERE Id_pays = :Id_pays";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':Id_pays', $id);
            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getByIdPays($id) {
        $sql = "SELECT * FROM Pays WHERE Id_pays = :Id_pays";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':Id_pays', $id);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllPays() {
        $sql = "SELECT * FROM Pays, Continents where continents.Id_continent = Pays.Id_pays";
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