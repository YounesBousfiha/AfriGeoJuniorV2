<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/VilleModel.php';
include '../../controllers/adminController.php';


$db = new DBConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate if it an admin if not admin  redirect it to home page

    $ville_id = Helpers::validateData($_POST['ville_id']);
    $ville_nom = Helpers::validateData($_POST['ville_nom']);
    $id_pays = Helpers::validateData($_POST['id_pays']);
    $ville_image = Helpers::validateData($_POST['ville_image']);
    $ville_type = Helpers::validateData($_POST['ville_type']);
    $ville_description = Helpers::validateData($_POST['ville_description']);

    if($_COOKIE['auth_token']) {
        $person = new PersonController($db);
        $user = $person->validateUser();

        if($user['Id_role'] != 1) {
            echo "You are not an admin";
            header("Location: /GoAway");
        }

        if($ville_id && $ville_nom && $ville_description && $id_pays) {
            $updatedCity = new Ville($ville_nom, $ville_description, $ville_type, $ville_image, $id_pays, $user['Id_user']);
            $updatedCity->__set('ville_id', $ville_id);
            $updatedCity->__set('ville_nom', $ville_nom);
            $updatedCity->__set('id_pays', $id_pays);
            $updatedCity->__set('ville_image', $ville_image);
            $updatedCity->__set('ville_description', $ville_description);

            $admin = new AdminController($db, null, null, $updatedCity);
            var_dump($updatedCity->__get('ville_id'));
            var_dump($updatedCity->__get('ville_nom'));
            var_dump($updatedCity->__get('ville_description'));

            $admin->updateVille($updatedCity->__get('ville_id'), $updatedCity->__get('ville_nom'), $updatedCity->__get('ville_description'));
        } else {
            echo "Invalidate Data";
        }
    } else {
        echo "You are not logged in";
    }
}
?>

<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
    <label for="ville_id">City ID:</label>
    <input type="text" id="ville_id" name="ville_id" required><br>

    <label for="ville_nom">City Name:</label>
    <input type="text" id="ville_nom" name="ville_nom" required><br>

    <label for="id_pays">Country ID:</label>
    <input type="text" id="id_pays" name="id_pays" required><br>

    <label for="ville_description">Description:</label>
    <input type="text" id="ville_description" name="ville_description"><br>

    <input type="submit" value="Update City">
</form>
