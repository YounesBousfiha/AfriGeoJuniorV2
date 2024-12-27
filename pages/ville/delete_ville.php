<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../controllers/adminController.php';

$db = new DBConnection();

$admin = new AdminController($db, null, null, null);

$villes = $admin->getAllVille();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = Helpers::validateData($_GET['id']);
        $admin->deleteVille($id);
        header("REFRESH: 0;");
    }
}
?>

<?php

echo '<table border="1">';
echo '<tr><th>Nom</th></tr>';

foreach ($villes as $ville) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($ville['Nom_ville']) . '</td>';
    echo '<td><a href="delete_ville.php?id=' . $ville['Id_ville'] . '">Delete</a></td>';
    echo '</tr>';
}

echo '</table>';
?>
