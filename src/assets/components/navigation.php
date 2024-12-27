<!-- <?php
include "../config/connection.php";
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $avatar = $_SESSION["avatar"];
    $role = $_SESSION["role"];
}

$path = $_SERVER["REQUEST_URI"];
$path_elem = explode("/", $path);
$curr_path = $path_elem["4"];
?> -->

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
                    class="hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear <?php if ($curr_path == "home.php") echo "bg-gray-100 border-b-gray-700"; ?>"
                    href="./home.php">Home</a>
            </li>
            <li>
                <a
                    class="hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear <?php if ($curr_path == "reservation.php") echo "bg-gray-100 border-b-gray-700"; ?>"
                    href="./explore.php">Explore The World</a>
            </li>
            <li>
                <a
                    class="hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear <?php if ($curr_path == "about.php") echo "bg-gray-100 border-b-gray-700"; ?>"
                    href="./dashboard.php">Dashboard</a>
            </li>
            <!-- <li>
                <a
                    class="hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear <?php if ($curr_path == "contact.php") echo "bg-gray-100 border-b-gray-700"; ?>"
                    href="./contact.php">Contact</a>
            </li> -->
            <?php
            // if (isset($_SESSION["role"])) {
            //     if ($role == 2) {
            //         echo "<li>";
            //         echo "<a class='hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear ";
            //         if ($curr_path == "dashboard.php") echo "bg-gray-100 border-b-gray-700'";
            //         echo "' href='./dashboard.php'>Dashboard</a></li>";
            //     }
            // }
            // ?>
        </ul>
        <div class="flex items-center h-full">
            <?php
            // if (isset($_SESSION["username"])) {
            //     echo "<a
            //             href='./logout.php'
            //             class='flex items-center hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-2 cursor-pointer transition-all delay-75 ease-linear gap-2'>
            //             <span>Logout</span>
            //             <img
            //                 src='../assets/images/icons/logout.svg'
            //                 class='size-5'
            //                 alt='' />
            //         </a>";

            //     echo "<a
            //             href='./profile.php'
            //             class='flex items-center hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear gap-2'>
            //             <span>$username</span>
            //             <img
            //                 src=$avatar
            //                 class='size-5'
            //                 alt='' />
            //         </a>";
            // } else {
                echo "<a
                        href='./auth/login.php'
                        class='flex items-center hover:bg-gray-100 hover:border-b-gray-700 border-transparent border p-2 px-4 cursor-pointer transition-all delay-75 ease-linear gap-2'>
                        <span>Login</span>
                        <img
                            src='../assets/images/icons/user.svg'
                            class='size-5'
                            alt='' />
                    </a>";
            // }
            ?> 
        </div>
    </div>
</nav>