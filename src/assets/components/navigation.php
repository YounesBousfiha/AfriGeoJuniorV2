<?php

require_once '../../config/db.php';
require_once '../../controllers/PersonController.php';

$auth_token = isset($_COOKIE["auth_token"]) ? $_COOKIE["auth_token"] : "null";
$user = null;

if($auth_token){
    $db = new DBConnection();
    $person = new PersonController($db);

    $user = $person->validateUser();
}

?>

<nav
    class="flex items-center justify-between px-20 max-md:px-6 max-sm:px-2 shadow-md text-gray-700 sticky top-0 bg-gray-50 z-10">
    <ul class="h-full flex items-center">
        <li class="mr-8" href="./index.html">
            <a
                class="mr-8 flex items-center gap-1 cursor-pointer"
                href="./home.php">
                <img src="../assets/images/icons/elephant.svg" class="size-8" alt="">
                <span>Africa Géo-Junior</span>
            </a>
        </li>
    </ul>
    <div
        class="flex items-center flex-1 justify-between text-sm max-md:hidden">
        <ul class="flex items-center">
            <li>
                <a
                    class="hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear"
                    href="./home.php">Home</a>
            </li>
            <li>
                <a
                    class="hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear"
                    href="./explore.php">Explore The World</a>
            </li>
            <?php
            if (isset($user)) {
                if ($user["Id_role"] == 1) {
                    echo "<li>";
                    echo "<a class='hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear";
                    echo "' href='./dashboard.php'>Dashboard</a></li>";
                }
            }
            ?>
        </ul>
        <div class="flex items-center h-full">
            <?php
            // var_dump(isset($_COOKIE['auth_token']));
            if (isset($user)) {
                echo "<a
                        href='./auth/logout.php'
                        class='flex items-center hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-2 cursor-pointer transition-all delay-75 ease-linear gap-2'>
                        <span>Logout</span>
                        <img
                            src='../assets/images/icons/logout.svg'
                            class='size-5'
                            alt='' />
                    </a>";

                echo "<a
                        href='#'
                        class='flex items-center hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear gap-2'>
                        <span>$user[Nom] $user[Prenom]</span>
                        <img
                            src='../assets/images/icons/user.svg'
                            class='size-5'
                            alt='' />
                    </a>";
            } else {
                echo "<a
                        href='./auth/login.php'
                        class='flex items-center hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear gap-2'>
                        <span>Login</span>
                        <img
                            src='../assets/images/icons/user.svg'
                            class='size-5'
                            alt='' />
                    </a>";
            }
            ?> 
        </div>
    </div>
</nav>