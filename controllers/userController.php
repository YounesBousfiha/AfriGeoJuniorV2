<?php

include 'PersonController.php';

class UserController extends PersonController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function signup($newuserInstance)
    {
        $isExist = self::isExist($this->db, $newuserInstance->__get('email'));
        if (!$isExist) {
            $sql = "INSERT INTO Users (Nom, Prenom, Email, Password, Id_role) VALUES (:Nom, :Prenom, :Email, :Password, :Id_role)";
            $hashed_password = password_hash($newuserInstance->__get('password'), PASSWORD_DEFAULT);
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(':Nom', $newuserInstance->__get('nom'));
                $stm->bindValue(':Prenom', $newuserInstance->__get('prenom'));
                $stm->bindValue(':Email', $newuserInstance->__get('email'));
                $stm->bindValue(':Password', $hashed_password);
                $stm->bindValue(':Id_role', $newuserInstance->__get('role'));
                if ($stm->execute()) {
                    header("Location: ABSOLUTE_URL"); // TODO: REDIRECT TO LOGIN PAGE
                    return true;
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        } else {
            echo "Email ALready registred";
        }
    }
}
