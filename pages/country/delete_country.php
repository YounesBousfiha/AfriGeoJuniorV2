<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../controllers/adminController.php';

$db = new DBConnection();

$admin = new AdminController($db, null, null, null);

$countries = $admin->getAllPays();

//var_dump($countries);

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = Helpers::validateData($_GET['id']);
        $admin->deletePays($id);
        header("REFRESH: 0;");
    }
}

?>



<?php


echo '<table border="1">';
echo '<tr><th>Nom</th></tr>';

foreach ($countries as $country) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($country['Nom_pays']) . '</td>';
    echo '<td><a href="delete_country.php?id=' . $country['Id_pays'] . '">Delete</a></td>';
    echo '</tr>';
}

echo '</table>';
?>