<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/VilleModel.php';
include '../../controllers/adminController.php';

$db = new DBConnection();
session_start();

$ville_id = Helpers::validateData($_SESSION["city-id"]);
$ville_nom = Helpers::validateData($_SESSION["city-nom"]);
$id_pays = Helpers::validateData($_SESSION["id-pays"]);
$ville_image = Helpers::validateData($_SESSION["city-image"]);
$ville_type = Helpers::validateData($_SESSION["city-type"]);
$ville_description = "lorem ipsum";

if (isset($_COOKIE['auth_token'])) {
    $person = new PersonController($db);
    $user = $person->validateUser();

    if ($user['Id_role'] != 1) {
        echo "You are not an admin";
        header("Location: /GoAway");
    }

    if ($ville_id && $ville_nom && $ville_description && $id_pays) {
        $updatedCity = new Ville($ville_nom, $ville_description, $ville_type, $ville_image, $id_pays, $user['Id_user']);
        $updatedCity->__set('ville_id', $ville_id);
        $updatedCity->__set('ville_nom', $ville_nom);
        $updatedCity->__set('id_pays', $id_pays);
        $updatedCity->__set('ville_image', $ville_image);
        $updatedCity->__set('ville_description', $ville_description);

        $admin = new AdminController($db, null, null, $updatedCity);

        $admin->updateVille($updatedCity->__get('ville_id'), $updatedCity->__get('ville_nom'), $updatedCity->__get('ville_description'));
        header("location: ./../../src/pages/cities-list.php");
    } else {
        echo "Invalidate Data";
    }
} else {
    echo "You are not logged in";
}
