<?php

include '../../config/db.php';
include '../../helpers/helpers.php';
include '../../model/UserModel.php';
include '../../controllers/userController.php';

$db = new DBConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = Helpers::validateData($_POST['nom']);
    $prenom = Helpers::validateData($_POST['prenom']);
    $email = Helpers::validateData($_POST['email']);
    $password = Helpers::validateData($_POST['password']);
    $passwordConfirm = Helpers::validateData($_POST['passwordConfirm']);
    $role_id = 1;

    if($password == $passwordConfirm) {

        $user = new User($nom, $prenom, $email, $password, $role_id);

        $userController = new UserController($db);

        $userController->signup($user);
    } else {
        echo "Password Not Matched";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>
        
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="passwordConfirm">Confirm Password:</label>
        <input type="password" id="passwordConfirm" name="passwordConfirm" required><br><br>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>