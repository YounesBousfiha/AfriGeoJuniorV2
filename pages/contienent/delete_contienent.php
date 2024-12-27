<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../controllers/adminController.php';

$db = new DBConnection();

$admin = new AdminController($db, null, null, null);

$continents = $admin->getAllContinent();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = Helpers::validateData($_GET['id']);
        $admin->deleteContinent($id);
        header("REFRESH: 0;");
    }
}
?>

<?php
echo '<table border="1">';
echo '<tr><th>Nom</th></tr>';

foreach ($continents as $continent) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($continent['Nom_continent']) . '</td>';
    echo '<td><a href="delete_contienent.php?id=' . $continent['Id_continent'] . '">Delete</a></td>';
    echo '</tr>';
}

echo '</table>';
?>
