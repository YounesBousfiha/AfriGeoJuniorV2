<?php

// inputs values
$username = "";
$email = "";
$password = "";
$confirm_password = "";
$phone = "";
$avatar = "../assets/images/icons/user.svg";
// label of error messages
$username_err = "";
$email_err = "";
$phone_err = "";
$password_err = "";
$confirm_password_err = "";

$error_query = "";

$email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$name_pattern = "/^[a-zA-Z\s]+$/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["confirm_password"]);

    if (empty($username)) $username_err = "Username is required";
    if (!preg_match($name_pattern, $username)) $username_err = "Username is invalid";
    if (empty($email)) $email_err = "Email is required";
    if (!preg_match($email_pattern, $email)) $email_err = "Email address invalid";
    if (empty($phone)) $phone_err = "Phone is required";
    if (empty($password)) $password_err = "USername is required";
    if (empty($confirm_password)) $confirm_password_err = "Password confirmation is required";

    if (!empty($username) && !empty($email) && !empty($phone) && !empty($password) && !empty($confirm_password)) {
        $all_users_statement = $connect->prepare("SELECT * FROM user WHERE email = ?");
        $all_users_statement->bind_param("s", $email);
        $all_users_statement->execute();
        $all_users_statement->store_result();

        if ($all_users_statement->num_rows > 0) {
            $email_err = "Email Already Used, Choose Another Address Email.";
        } else if ($password != $confirm_password) $confirm_password_err = "Passwords are not Match!";
        else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $create_user_statement = $connect->prepare("INSERT INTO user (username, phone, email, password, avatar) VALUES (?, ?, ?, ?, ?)");
            $create_user_statement->bind_param("sssss", $username, $phone, $email, $hashed_password, $avatar);
            if ($create_user_statement->execute()) {
                header("location: login.php");
            } else {
                $error_query = "Something Went Wrong While Inserting, Try Again Later";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
            <img src="../assets/images/icons/arrow-left.svg" class="size-4" alt="">
            <a href="../../pages/home.php" class="hover:underline cursor-pointer">Back to home page</a>
        </div>

        <div class="flex-grow flex items-center">
            <form method="POST" action="" class="bg-white w-[400px] h-auto shadow-lg rounded-md flex flex-col">
                <h1 class="p-4 border border-transparent border-l-black font-bold text-xl text-center">REGISTER</h1>
                <div class="p-6 flex flex-col text-sm gap-2">
                    <label name="error_query" class="bg-red-50 text-red-500"><?php echo $error_query; ?></label>
                    <div class="flex flex-col">
                        <label class="text-gray-500" for="username">username </label>
                        <input value="<?php echo $username; ?>" autocomplete="username" type="text" name="username" id="username" placeholder="e.g: Jhone Dow" class="bg-gray-100 rounded-sm p-1">
                        <label name="username_err" class="text-red-500"><?php echo $username_err; ?></label>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-gray-500" for="email">email </label>
                        <input value="<?php echo $email; ?>" autocomplete="email" type="email" name="email" id="email" placeholder="e.g: example@gmail.com" class="bg-gray-100 rounded-sm p-1">
                        <label name="email_err" class="text-red-500"><?php echo $email_err; ?></label>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-gray-500" for="phone">phone </label>
                        <input value="<?php echo $phone; ?>" type="text" name="phone" id="phone" placeholder="e.g: +212-645-506932" class="bg-gray-100 rounded-sm p-1">
                        <label name="phone_err" class="text-red-500"><?php echo $phone_err; ?></label>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-gray-500" for="password">password </label>
                        <input value="<?php echo $password; ?>" autocomplete="new-password" type="password" name="password" id="password" placeholder="password" class="bg-gray-100 rounded-sm p-1">
                        <label name="password_name" class="text-red-500"><?php echo $password_err; ?></label>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-gray-500" for="confirm_password">confirm password </label>
                        <input value="<?php echo $confirm_password; ?>" autocomplete="new-password" type="password" name="confirm_password" id="confirm_password" placeholder="confirm password" class="bg-gray-100 rounded-sm p-1">
                        <label name="confirm_password_err" class="text-red-500"><?php echo $confirm_password_err; ?></label>
                        <div class="flex gap-1 mt-2">
                            <input onchange="handle_show_pwd()" type="checkbox" name="show-pwd" id="show-pwd">
                            <label for="show-pwd">show password</label>
                        </div>
                    </div>


                    <input type="submit" name="submit" id="submit" value="Register" class="bg-black rounded-md p-2 mt-8 text-white">
                    <p class="mt-1">Already have an Account? <a class="font-bold hover:underline" href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function handle_show_pwd() {
            if (document.getElementById("show-pwd").checked) {
                document.getElementById("confirm_password").setAttribute("type", "text");
            } else document.getElementById("confirm_password").setAttribute("type", "password");
        }
    </script>
</body>

</html>