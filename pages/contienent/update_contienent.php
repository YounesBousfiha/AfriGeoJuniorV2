<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/ContinentModel.php';
include '../../controllers/adminController.php';

$db = new DBConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $continent_id = Helpers::validateData($_POST['continent_id']);
    $continent_nom = Helpers::validateData($_POST['continent_nom']);
    if($_COOKIE['auth_token']) {
        $person = new PersonController($db);
        $user = $person->validateUser();

        if($user['Id_role'] != 1) {
            echo "You are not an admin";
            header("Location: /GoAway");
        }

        if($continent_id && $continent_nom) {
            $updatedContinent = new Continent($continent_nom, $user['Id_user']);
            $updatedContinent->__set('continent_id', $continent_id);
            $admin = new AdminController($db, null, null, $updatedContinent);
            $admin->updateContinent($updatedContinent->__get('continent_id'), $updatedContinent->__get('continent_nom'));
        } else {
            echo "Invalidate Data";
        }
    } else {
        echo "You are not logged in";
    }
}
?>

<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
    <label for="continent_id">Continent ID:</label>
    <input type="text" id="continent_id" name="continent_id" required><br>
    <label for="continent_nom">Continent Name:</label>
    <input type="text" id="continent_nom" name="continent_nom" required><br>
    <input type="submit" value="Update Continent">
</form>
