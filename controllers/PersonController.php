<?php

include 'continentController.php';
include 'paysController.php';
include 'villeController.php';

class PersonController {
    use ContinentController {
        getAllContinent as public;
        getByIdContinent as public;
    }

    use PaysController {
        getAllPays as public;
        getByIdPays as public;
    }

    use VilleController {
        getAllVille as public;
        getByIdVille as public;
    }

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    private function generateToken() {
        return bin2hex(random_bytes(32));
    }

    public function isExist($db, $email) {
        //var_dump(get_class_methods($db));
        $isFound = false;
        $sql = "SELECT * FROM Users WHERE Email = :Email";
        try {
            $stm = $db->prepare($sql);
            $stm->bindValue(':Email', $email);
            if($stm->execute()) {
                if($stm->rowCount() > 0) {
                    $isFound = true;
                }
            }
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $isFound;
    }


    public function login($db, $email, $password) {
        $isExist = self::isExist($db, $email);
        if($isExist) {
            $sql = "SELECT * FROM Users WHERE Email = :Email";

            try {
                $stm = $db->prepare($sql);
                $stm->bindValue(':Email', $email);
                if($stm->execute()) {
                   $data = $stm->fetch(PDO::FETCH_ASSOC);
                   if(password_verify($password, $data['Password'])) {
                    $token = self::generateToken();
                    setcookie("auth_token", $token, time() + 3600, '/');
                    $sql = "UPDATE Users SET Token = :Token WHERE Email = :Email";
                    $stm = $db->prepare($sql);
                    $stm->bindValue(':Token', $token);
                    $stm->bindValue(':Email', $email);
                    $stm->execute();
                    if($data['Id_role'] == 1) {
                        header("Location: ADMIN_URL"); 
                    } else {
                        header("Location: USER_URL"); 
                   } 
                   }
                }
            } catch (Exception $e) { 
                echo "Error : " . $e->getMessage();
            }
        } else {
            echo "Credentials Wrong !";
        }

    }

    public function validateUser() {
        $token = $_COOKIE['auth_token'];
        $user = null;
        if($token) {
            $sql = "SELECT * FROM Users WHERE Token = :Token";

            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(':Token', $token);
                if($stm->execute()) {
                    $user = $stm->fetch(PDO::FETCH_ASSOC);
                }

            } catch(Exception $e) {
                echo "Error : " . $e->getMessage();
            }
        }

        return $user;
    }

    public function logout() {
        var_dump("logout");
        setcookie("auth_token" , "", time() - 3600, '/');
        header("Location: LOGIN_URL");
    }

}

?>