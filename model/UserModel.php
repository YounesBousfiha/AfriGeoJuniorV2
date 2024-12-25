<?php


class User {
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $role = 2;
    private $token = null;

    public function __get($property) {
        return $this->$property;
    }
    public function __set($property, $value) {
        $this->$property = $value;
    }

}

?>