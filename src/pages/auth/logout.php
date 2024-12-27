<?php

include '../../../config/db.php';
include '../../../controllers/PersonController.php';

$db = new DBConnection();

$person = new PersonController($db);
$user = $person->validateUser();
var_dump($user);
$person->logout();
