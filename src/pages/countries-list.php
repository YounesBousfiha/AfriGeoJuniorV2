<?php
include "../../config/db.php";
include "../../controllers/adminController.php";

$db = new DBConnection();
$admin = new AdminController($db);
$all_countries = $admin->getAllPays();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/input.css?v=2" />
    <link rel="stylesheet" href="../assets/css/output.css?v=2" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body class="font-[Oswald]">
    <div class="min-h-[100vh] flex flex-col">
        <?php include "../assets/components/navigation.php"; ?>

        <div class="flex flex-grow w-full max-md:flex-col">
            <section id="dashboard" class="w-1/5 bg-gray-100 flex flex-col max-md:w-full">
                <div class="flex py-6 px-2 items-center gap-1">
                    <img
                        src="../assets/images/icons/dashboard.svg"
                        class="size-6"
                        alt="" />
                    <h1 class="text-xl">Dashboard</h1>
                </div>
                <ul class="flex flex-col">
                    <a href="./dashboard.php"
                        id="visualisation_choice"
                        class="p-2 hover:bg-white transition-all delay-75 ease-linear cursor-pointer flex items-center gap-2">
                        <img
                            src="../assets/images/icons/graphs.svg"
                            class="size-5"
                            alt="" />
                        <p>Visualisation</p>
                    </a>
                    <a href="./users-list.php"
                        id="users_choice"
                        class="p-2 hover:bg-white transition-all delay-75 ease-linear cursor-pointer flex items-center gap-2">
                        <img
                            src="../assets/images/icons/users.svg"
                            class="size-5"
                            alt="" />
                        <p>Users</p>
                    </a>
                    <a href="./continents-list.php"
                        id="menus_choice"
                        class="p-2 hover:bg-white transition-all delay-75 ease-linear cursor-pointer flex items-center gap-2">
                        <img
                            src="../assets/images/icons/continent.svg"
                            class="size-5"
                            alt="" />
                        <p>Continents</p>
                    </a>
                    <a href="./countries-list.php"
                        id="reservations_choice"
                        class="p-2 hover:bg-white bg-white transition-all delay-75 ease-linear cursor-pointer flex items-center gap-2">
                        <img
                            src="../assets/images/icons/countries.svg"
                            class="size-5"
                            alt="" />
                        <p>Countries</p>
                    </a>
                    <a href="./cities-list.php"
                        id="plats_choice"
                        class="p-2 hover:bg-white transition-all delay-75 ease-linear cursor-pointer flex items-center gap-2">
                        <img
                            src="../assets/images/icons/cities.svg"
                            class="size-5"
                            alt="" />
                        <p>Cities</p>
                    </a>
                </ul>
            </section>
            <section class="w-4/5 max-md:w-full">
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-2xl">Countries</h1>
                    <!-- <div id="add-country-button" class="flex items-center gap-1 cursor-pointer hover:bg-gray-100 p-2 px-4 rounded-md"> -->
                    <a href="../../src/pages/cruds/country/create.php" class="flex items-center gap-1 cursor-pointer hover:bg-gray-100 p-2 px-4 rounded-md">
                        <span>Add New Country</span>
                        <img src="../assets/images/icons/add-icons.svg" class="size-4" alt="">
                    </a>
                    <!-- </div> -->
                </div>
                <div class="relative overflow-auto max-h-[75vh]">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">
                                    Country ID
                                </th>
                                <th class="px-6 py-3">
                                    Name
                                </th>
                                <th class="px-6 py-3">
                                    Population
                                </th>
                                <th class="px-6 py-3">
                                    langues
                                </th>
                                <th class="px-6 py-3">
                                    continent
                                </th>
                                <th class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($all_countries as $country) {
                                echo "<tr class='odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700'>";
                                echo "<th class='px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white'>$country[Id_pays]</th>";
                                echo "<td class='px-6 py-2'>$country[Nom_pays]</td>";
                                echo "<td class='px-6 py-2'>$country[Population]</td>";
                                echo "<td class='px-6 py-2'>Arabic, Tamazight</td>";
                                echo "<td class='px-6 py-2'>$country[Continent_name]</td>";
                                echo "<td class='px-6 py-2 flex gap-2'>
                                    <a href='../../src/pages/cruds/country/update.php?id_country=$country[Id_pays]' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a>
                                    <a href='../../pages/country/delete_country.php?id=$country[Id_pays]' class='font-medium text-red-600 dark:text-red-500 hover:underline'>Delete</a>
                                </td>";
                                echo "</tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <?php include "../assets/components/footer.php"; ?>
    </div>
</body>

</html>