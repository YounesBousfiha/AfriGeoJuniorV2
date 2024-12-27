<?php


trait VilleController {

    public function createVille($nom, $description, $type, $id_pays, $pays_image, $createdby) {
        $sql = "INSERT INTO Villes(Nom_ville,
                                    Description_ville,
                                    Type_Ville,
                                    Id_pays,
                                    Image,
                                    Created_by )
                                    VALUES (:Nom_ville,
                                            :Description_ville,
                                            :Type_Ville,
                                            :Id_pays,
                                            :Created_by
                                            )";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':Nom_ville', $nom);
            $stm->bindValue(':Description_ville', $description);
            $stm->bindValue(':Type_Ville', $type);
            $stm->bindValue(':Pays_image');
            $stm->bindValue(':Id_pays', $id_pays);
            $stm->bindValue(':Created_by', $createdby);
            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() ;
        }
    }

    public function updateVille($nom, $description) {
        $sql = "UPDATE Villes SET Nom_Ville = :Nom_Ville, Description_ville = :Description_ville";

        try {
            $stm = $this->db->prepare($sql);

            $stm->bindValue(':Nom_Ville', $nom);
            $stm->bindValue(':Description_ville', $description);
    
            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function deleteVille($id) {
        $sql = "DELETE FROM Ville WHERE Id_ville = :Id_ville";

        try {
            $stm = $this->db->prepare($sql);

            $stm->bindValue(':Id_ville', $id);

            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }   
    }
    public function getByIdVille($id) {
        $sql = "SELECT * FROM Ville WHERE Id_ville = :Id_ville";

        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(":Id_ville", $id);
            $stm->execute();
            $res = $stm->get_result();
            $data = $res->fetchALL(); // TEST WITHOUT PDO::FETCH_ASSOC
            return $data;
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllVille() {
        $sql = "SELECT * FROM Villes";

        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>