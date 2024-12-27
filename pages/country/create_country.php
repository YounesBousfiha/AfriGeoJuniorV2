<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/PaysModel.php';
include '../../controllers/adminController.php';

$db = new DBConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate if it an admin if not admin  redirect it to home page

    $pays_nom = Helpers::validateData($_POST['pays_nom']);
    $pays_population = Helpers::validateData($_POST['pays_population']);
    $id_continent = 2;
    $pays_image = Helpers::validateData($_POST['pays_image']);
    if($_COOKIE['auth_token']) {
        $person = new PersonController($db);
        $user = $person->validateUser();

        if($user['Id_role'] != 1) {
            echo "You are not an admin";
            header("Location: /GoAway");
        }

        $pays_nom = Helpers::validateData($_POST['pays_nom']);
        $pays_population = Helpers::validateData($_POST['pays_population']);
        $id_continent = Helpers::validateData($_POST['id_continent']);
        $pays_image = Helpers::validateData($_POST['pays_image']);
        $created_by = $user['Id_user'];

        var_dump($pays_nom, $pays_population, $id_continent, $created_by);

        if($pays_nom && $pays_population && $id_continent && $created_by) {
       
            $newCountry = new Pays($pays_nom, $pays_population, $pays_image, $id_continent, $created_by);
    
            $admin = new AdminController($db, null, $newCountry, null);
            $admin->createPays($newCountry);
        } else {
            echo "Invalidate Data";
        }
    } else {
        echo "You are not logged in";
    }
}


//$countryData = new Country(); // Insert data into the object;



// Create Pages for CRUDS for Continent , Ville , Pays
?>

