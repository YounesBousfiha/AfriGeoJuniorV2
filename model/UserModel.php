<?php 

include 'PersonModel.php';

class User extends Person {


    public function __construct($nom, $prenom, $email, $password, $role)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
}
?>