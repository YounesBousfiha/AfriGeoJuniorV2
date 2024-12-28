<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/PaysModel.php';
include '../../controllers/adminController.php';

$db = new DBConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate if it an admin if not admin  redirect it to home page

    $pays_id = Helpers::validateData($_POST['pays_id']);
    $pays_nom = Helpers::validateData($_POST['pays_nom']);
    $pays_population = Helpers::validateData($_POST['pays_population']);
    $id_continent = Helpers::validateData($_POST['id_continent']);
    $pays_image = Helpers::validateData($_POST['pays_image']);

    if($_COOKIE['auth_token']) {
        $person = new PersonController($db);
        $user = $person->validateUser();

        if($user['Id_role'] != 1) {
            echo "You are not an admin";
            header("Location: /GoAway");
        }

        if($pays_id && $pays_nom && $pays_population && $id_continent) {
            $updatedCountry = new Pays($pays_nom, $pays_population, $pays_image, $id_continent, $user['Id_user']);
            $updatedCountry->__set('pays_id', $pays_id);
            $updatedCountry->__set('pays_nom', $pays_nom);
            $updatedCountry->__set('pays_population', $pays_population);
            $updatedCountry->__set('id_continent', $id_continent);
            $updatedCountry->__set('pays_image', $pays_image);

            $admin = new AdminController($db, null, $updatedCountry, null);

            $admin->updatePays($updatedCountry->__get('pays_id'), $updatedCountry->__get('pays_nom'), $updatedCountry->__get('pays_population'), $updatedCountry->__get('id_continent'), $updatedCountry->__get('pays_image'));
        } else {
            echo "Invalidate Data";
        }
    } else {
        echo "You are not logged in";
    }
}
?>


<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
    <label for="pays_id">Country ID:</label>
    <input type="text" id="pays_id" name="pays_id" required><br>

    <label for="pays_nom">Country Name:</label>
    <input type="text" id="pays_nom" name="pays_nom" required><br>

    <label for="pays_population">Population:</label>
    <input type="text" id="pays_population" name="pays_population" required><br>

    <label for="id_continent">Continent ID:</label>
    <input type="text" id="id_continent" name="id_continent" required><br>

    <label for="pays_image">Image URL:</label>
    <input type="text" id="pays_image" name="pays_image"><br>

    <input type="submit" value="Update Country">
</form>