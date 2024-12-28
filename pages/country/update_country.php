<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/PaysModel.php';
include '../../controllers/adminController.php';

$db = new DBConnection();
session_start();

$pays_id = Helpers::validateData($_SESSION["pays-id"]);
$pays_nom = Helpers::validateData($_SESSION["pays-nom"]);
$pays_population = Helpers::validateData($_SESSION["pays-population"]);
$id_continent = Helpers::validateData($_SESSION["id-continent"]);
$pays_image = Helpers::validateData($_SESSION["pays-image"]);

if ($_COOKIE['auth_token']) {
    $person = new PersonController($db);
    $user = $person->validateUser();

    if ($user['Id_role'] != 1) {
        echo "You are not an admin";
        header("Location: /GoAway");
    }

    if ($pays_id && $pays_nom && $pays_population && $id_continent) {
        $updatedCountry = new Pays($pays_nom, $pays_population, $pays_image, $id_continent, $user['Id_user']);
        $updatedCountry->__set('pays_id', $pays_id);
        $updatedCountry->__set('pays_nom', $pays_nom);
        $updatedCountry->__set('pays_population', $pays_population);
        $updatedCountry->__set('id_continent', $id_continent);
        $updatedCountry->__set('pays_image', $pays_image);

        var_dump($updatedCountry);

        $admin = new AdminController($db, null, $updatedCountry, null);

        $admin->updatePays($updatedCountry->__get('pays_id'), $updatedCountry->__get('pays_nom'), $updatedCountry->__get('pays_population'), $updatedCountry->__get('id_continent'), $updatedCountry->__get('pays_image'));

        header("location: ./../../src/pages/countries-list.php");
    } else {
        echo "Invalidate Data";
    }
} else {
    echo "You are not logged in";
}
