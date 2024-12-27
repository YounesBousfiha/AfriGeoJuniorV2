<?php


class Person {
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $role;
    private $token = null;

    public function __get($property) {
        return $this->$property;
    }
    public function __set($property, $value) {
        $this->$property = $value;
    }
}

?>