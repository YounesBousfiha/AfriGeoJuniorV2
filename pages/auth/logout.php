<?php

include '../../config/db.php';
include '../../controllers/PersonController.php';

$db = new DBConnection();


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $person = new PersonController($db);
    $person->logout();
}

if($_COOKIE['auth_token']) {

    $person = new PersonController($db);
    $user = $person->validateUser();
} else {
    echo "You are not logged in";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
        if($user) {
            echo "<h1>Welcome {$user['Nom']}</h1>
            <form action='{$_SERVER['PHP_SELF']}' method='POST'>
                <button type='submit'>Logout</button>
            </form>";
        } else {
            echo "You are not logged in";
        }
        ?>
    </div>
</body>
</html>