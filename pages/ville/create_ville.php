<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/VilleModel.php';
include '../../controllers/adminController.php';

$db = new DBConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate if it an admin if not admin  redirect it to home page

    $ville_nom = Helpers::validateData($_POST['ville_nom']);
    $id_pays = Helpers::validateData($_POST['id_pays']);
    $ville_image = Helpers::validateData($_POST['ville_image']);
    $ville_description = Helpers::validateData($_POST['ville_description']);
    $ville_type = Helpers::validateData($_POST['ville_type']);
    
    if($_COOKIE['auth_token']) {
        $person = new PersonController($db);
        $user = $person->validateUser();

        if($user['Id_role'] != 1) {
            echo "You are not an admin";
            header("Location: /GoAway");
        }

        if($ville_nom && $id_pays && $ville_description && $ville_type) {
            var_dump("Nom :", $ville_nom);
            $newCity = new Ville($ville_nom, $ville_description, $ville_type, $ville_image, $id_pays, $user['Id_user']);

    
            $admin = new AdminController($db, null, null, $newCity);
            $admin->createVille($newCity);
        } else {
            echo "Invalidate Data";
        }
    } else {
        echo "You are not logged in";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ville</title>
</head>
<body>
    <h1>Create a New Ville</h1>
    <form action="create_ville.php" method="POST">
        <label for="ville_nom">Ville Nom:</label>
        <input type="text" id="ville_nom" name="ville_nom" required><br><br>

        <label for="ville_description">Ville Description:</label>
        <textarea id="ville_description" name="ville_description" required></textarea><br><br>

        <label for="ville_type">Ville Type:</label>
        <input type="text" id="ville_type" name="ville_type" required><br><br>

        <label for="ville_image">Ville Image URL:</label>
        <input type="text" id="ville_image" name="ville_image"><br><br>

        <label for="id_pays">ID Pays:</label>
        <input type="number" id="id_pays" name="id_pays" required><br><br>

        <input type="submit" value="Create Ville">
    </form>
</body>
</html>