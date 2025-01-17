<?php


trait VilleController {

    public function createVille() {
        $sql = "INSERT INTO Villes(Nom_ville,
                                    Description_ville,
                                    Type_Ville,
                                    Id_pays,
                                    Image,
                                    Created_by )
                                    VALUES (:Nom_ville,
                                            :Description_ville,
                                            :Type_Ville,
                                            :Image,
                                            :Id_pays,
                                            :Created_by
                                            )";
        try {
            $newVille = $this->ville;
            $stm = $this->db->prepare($sql);
            echo "1\n";
            $stm->bindValue(':Nom_ville', $newVille->__get('ville_nom'));
            echo "2\n";
            $stm->bindValue(':Description_ville', $newVille->__get('ville_description'));
            echo "3\n";
            $stm->bindValue(':Type_Ville', $newVille->__get('ville_type'));
            echo "4\n";
            $stm->bindValue(':Image', $newVille->__get('ville_image'));
            echo "5\n";
            $stm->bindValue(':Id_pays', $newVille->__get('id_pays'));
            echo "6\n";
            $stm->bindValue(':Created_by', $newVille->__get('created_by'));
            echo "7\n";
            $stm->execute();
            echo "8\n";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() ;
        }
    }

    public function updateVille($id_ville, $nom, $description) {
        $sql = "UPDATE Villes SET Nom_Ville = :Nom_Ville, Description_ville = :Description_ville WHERE Id_ville = :Id_ville";

        try {
            $stm = $this->db->prepare($sql);

            $stm->bindValue(':Nom_Ville', $nom);
            $stm->bindValue(':Description_ville', $description);
            $stm->bindValue(':Id_ville', $id_ville);
    
            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function deleteVille($id) {
        $sql = "DELETE FROM Villes WHERE Id_ville = :Id_ville";

        try {
            $stm = $this->db->prepare($sql);

            $stm->bindValue(':Id_ville', $id);

            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }   
    }
    public function getByIdVille($id) {
        $sql = "SELECT * FROM Villes WHERE Id_ville = :Id_ville";

        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(":Id_ville", $id);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllVilleInPays($id){
        $sql = "SELECT * FROM villes WHERE villes.Id_pays = :Id_pays";

        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(":Id_pays", $id);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllVille() {
        $sql = "SELECT * FROM Villes";

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