<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/PaysModel.php';
include '../../controllers/adminController.php';

$db = new DBConnection();
session_start();

// validate if it an admin if not admin  redirect it to home page
$pays_nom = Helpers::validateData($_SESSION["pays-nom"]);
$pays_population = Helpers::validateData($_SESSION['pays-population']);
$id_continent = Helpers::validateData($_SESSION["id-continent"]);
$pays_image = Helpers::validateData($_SESSION['pays-image']);
if ($_COOKIE['auth_token']) {
    $person = new PersonController($db);
    $user = $person->validateUser();

    if ($user['Id_role'] != 1) {
        echo "You are not an admin";
        header("Location: /GoAway");
    }

    $pays_nom = Helpers::validateData($_SESSION['pays-nom']);
    $pays_population = Helpers::validateData($_SESSION['pays-population']);
    $id_continent = Helpers::validateData($_SESSION['id-continent']);
    $pays_image = Helpers::validateData($_SESSION['pays-image']);
    $created_by = $user['Id_user'];

    var_dump($user["Id_user"]);

    if ($pays_nom && $pays_population && $id_continent && $created_by) {
        $newCountry = new Pays($pays_nom, $pays_population, $id_continent, $pays_image, $created_by);

        $admin = new AdminController($db, null, $newCountry, null);
        $admin->createPays($newCountry);
        session_unset();
        header("location: ./../../src/pages/countries-list.php");
    } else {
        echo "Invalidate Data";
    }
} else {
    echo "You are not logged in";
}


//$countryData = new Country(); // Insert data into the object;



// Create Pages for CRUDS for Continent , Ville , Pays
