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
        header("location: ./../../src/pages/cities-list.php");
    }
}
