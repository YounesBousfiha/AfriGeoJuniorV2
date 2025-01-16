<?php
include "../../config/db.php";
include "../../controllers/adminController.php";

$db = new DBConnection();

if($_COOKIE['auth_token']) {
  $person = new PersonController($db);
  $user = $person->validateUser();

  if($user['Id_role'] != 1) {
      header("Location: ./home.php");
  }

} else {
  header("Location: ./home.php");
}

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
            class="p-2 hover:bg-white bg-white transition-all delay-75 ease-linear cursor-pointer flex items-center gap-2">
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
            class="p-2 hover:bg-white transition-all delay-75 ease-linear cursor-pointer flex items-center gap-2">
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
    <?php include "./graphs.php"; ?>
    </div>

    <footer class="bg-gray-100 p-8 text-sm flex items-center justify-center">
      <p class="text-center">CopyRight 2024 @ All Right Reserved</p>
    </footer>
  </div>
</body>

</html>