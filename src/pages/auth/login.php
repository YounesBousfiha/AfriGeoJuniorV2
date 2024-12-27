<?php

include '../../../config/db.php';
include '../../../helpers/helpers.php';
include '../../../model/UserModel.php';
include '../../../controllers/userController.php';

$db = new DBConnection();

$email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$name_pattern = "/^[a-zA-Z\s]+$/";

// inputs values
$email = "";
$password = "";
// label of error messages
$email_err = "";
$password_err = "";
// global errors label
$error_query = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if (empty($email)) $email_err = "Email is required";
    if (!preg_match($email_pattern, $email)) $email_err = "Email address invalid";
    if (empty($password)) $password_err = "Password is required";

    if (!empty($email) && !empty($password)) {
        $userController = new UserController($db);
        $result = $userController->login($db, $email, $password);
        $error_query = $result;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/input.css">
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-[Oswald]">
    <div class="bg-gray-50 w-full min-h-[100vh] flex flex-col justify-between items-center">
        <div class="bg-gray-100 w-full flex items-center gap-1 p-2">
            <img src="../../assets/images/icons/arrow-left.svg" class="size-4" alt="">
            <a href="../../pages/home.php" class="hover:underline cursor-pointer">Back to home page</a>
        </div>

        <div class="flex-grow flex items-center">
            <form action="" method="post" class="bg-white w-[400px] h-auto shadow-lg rounded-md flex flex-col">
                <h1 class="p-4 border border-transparent border-l-black font-bold text-xl text-center">LOGIN</h1>
                <div class="p-6 flex flex-col text-sm gap-2">
                    <label name="error_query" class="bg-red-50 text-red-500"><?php echo $error_query; ?></label>
                    <div class="flex flex-col">
                        <label class="text-gray-500" for="email">email </label>
                        <input value="<?php echo $email; ?>" type="email" name="email" id="email" placeholder="e.g: example@gmail.com" class="bg-gray-100 rounded-sm p-1">
                        <label name="email_err" class="text-red-600"><?php echo $email_err; ?></label>
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="text-gray-500" for="password">password </label>
                        <input value="<?php echo $password; ?>" type="password" name="password" id="password" placeholder="password" class="bg-gray-100 rounded-sm p-1">
                        <label name="password_err" class="text-red-600"><?php echo $password_err; ?></label>
                        <div class="flex gap-1">
                            <input onchange="handle_show_pwd()" type="checkbox" name="show-pwd" id="show-pwd">
                            <label for="show-pwd">show password</label>
                        </div>
                    </div>


                    <input type="submit" name="submit" id="submit" value="Login" class="bg-black rounded-md p-2 mt-8 text-white">
                    <p class="mt-1">Don't have an Account? <a class="font-bold hover:underline" href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <script>
        function handle_show_pwd() {
            if (document.getElementById("show-pwd").checked) {
                document.getElementById("password").setAttribute("type", "text");
            } else document.getElementById("password").setAttribute("type", "password");
        }
    </script>
</body>

</html>