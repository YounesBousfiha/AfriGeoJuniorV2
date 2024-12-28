<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/VilleModel.php';
include '../../controllers/adminController.php';

$db = new DBConnection();
session_start();

$ville_nom = Helpers::validateData($_SESSION["city-nom"]);
$id_pays = Helpers::validateData($_SESSION["city-type"]);
$ville_image = Helpers::validateData($_SESSION["id-pays"]);
$ville_description = "lorem ipsum";
$ville_type = Helpers::validateData($_SESSION["image-image"]);

if (isset($_COOKIE['auth_token'])) {
    $person = new PersonController($db);
    $user = $person->validateUser();

    if ($user['Id_role'] != 1) {
        echo "You are not an admin";
        header("Location: /GoAway");
    }

    if ($ville_nom && $id_pays && $ville_description && $ville_type) {
        var_dump("Nom :", $ville_nom);
        $newCity = new Ville($ville_nom, $ville_description, $ville_type, $ville_image, $id_pays, $user['Id_user']);


        $admin = new AdminController($db, null, null, $newCity);
        $admin->createVille($newCity);
        session_unset();
        header("location: ./../../src/pages/cities-list.php");
    } else {
        echo "Invalidate Data";
    }
} else {
    echo "You are not logged in";
}
