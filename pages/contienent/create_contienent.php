<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/ContinentModel.php';
include '../../controllers/adminController.php';

$db = new DBConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $continent_nom = Helpers::validateData($_POST['continent_nom']);
    if($_COOKIE['auth_token']) {
        $person = new PersonController($db);
        $user = $person->validateUser();

        if($user['Id_role'] != 1) {
            echo "You are not an admin";
            header("Location: /GoAway");
        }

        $created_by = $user['Id_user'];

        if($continent_nom && $created_by) {
            $newContinent = new Continent($continent_nom, $created_by);

            $admin = new AdminController($db, null, null, $newContinent);
            $admin->createContinent($newContinent);
        } else {
            echo "Invalidate Data";
        }
    } else {
        echo "You are not logged in";
    }
}
?>

<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
    <label for="continent_nom">Continent Name:</label>
    <input type="text" id="continent_nom" name="continent_nom" required><br>
    <input type="submit" value="Create Continent">
</form>