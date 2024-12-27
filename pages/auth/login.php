<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/UserModel.php';
include '../../controllers/userController.php';

$db = new DBConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = Helpers::validateData($_POST['email']);
    $password = Helpers::validateData($_POST['password']);

    $userController = new UserController($db);

    $userController->login($db, $email, $password);
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
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>