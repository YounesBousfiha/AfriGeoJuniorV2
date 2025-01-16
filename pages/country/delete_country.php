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
        // header("location: ./../../src/pages/countries-list.php");
        // TODO: not working
        // FIX: Error: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`geojuniorv2`.`villes`, CONSTRAINT `villes_ibfk_1` FOREIGN KEY (`Id_pays`) REFERENCES `pays` (`Id_pays`))
    }
}
