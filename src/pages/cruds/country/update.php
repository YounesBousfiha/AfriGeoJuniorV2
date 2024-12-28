<?php

include '../../../../config/db.php';
include '../../../../controllers/AdminController.php';

$id_country = $_GET["id_country"];

$db = new DBConnection();
$admin = new AdminController($db);
$country = $admin->getByIdPays($id_country);
$all_continents = $admin->getAllContinent();


$pays_nom = $country["Nom_pays"];
$pays_population = $country["Population"];
$pays_langues = "Arabic";
$id_continent = $country["Id_continent"];
$pays_image = $country["Image"];
// errors variables
$pays_nom_err = "";
$pays_population_err = "";
$pays_langues_err = "";
$id_continent_err = "";
$pays_image_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($pays_nom)) $pays_nom_err = "Country name is required...";
    if (empty($pays_population)) $pays_population_err = "Country population is required...";
    if (empty($pays_langues)) $pays_langues_err = "Country langues is required...";
    if (empty($id_continent)) $id_continent_err = "Country continent is required...";
    if (empty($pays_image)) $pays_image_err = "Country image is required...";

    if (!empty($pays_nom && !empty($pays_population) && !empty($pays_langues) && !empty($id_continent) && !empty($pays_image))) {
        session_start();
        $_SESSION["pays-nom"] = $pays_nom;
        $_SESSION["pays-population"] = $pays_population;
        $_SESSION["pays-langues"] = $pays_langues;
        $_SESSION["id-continent"] = $id_continent;
        $_SESSION["pays-image"] = $pays_image;
        header("location: localhost\AfriGeoJuniorV2\pages\country\update_country.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create continent</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-[Oswald]">
    <div class="h-[100vh] flex items-center bg-gray-50 flex-col">
        <div class="bg-gray-100 w-full flex items-center gap-1 p-2">
            <img src="../../../assets/images/icons/arrow-left.svg" class="size-4" alt="">
            <a href="../../countries-list.php" class="hover:underline cursor-pointer">Back to Dashboard page</a>
        </div>

        <div class="flex-grow flex justify-center items-center w-full">
            <form action="" method="post" class="bg-white min-h-[400px] w-1/2 max-md:h-auto max-lg:w-3/5 max-md:w-4/5 max-sm:w-full max-sm:h-[98%] max-sm:m-2 shadow-lg flex flex-col p-4 gap-2">
                <div class="flex flex-col py-4">
                    <h1 class="text-xl font-medium">Country Informations</h1>
                    <p class="text-gray-400 text-sm">Fill the inputs with a Valid data to create a new record in your Database</p>
                </div>

                <div class="flex-grow flex flex-col text-sm gap-1 mb-4">
                <label for="pays-nom" class="text-gray-600">Country name</label>
                    <input value="<?= $pays_nom ?>" name="pays-nom" id="pays-nom" type="text" class="bg-gray-100 p-1" placeholder="eg: Morocco, Egypt...">
                    <p id="country-name-err" class="text-red-600 text-sm"><?= $pays_nom_err ?></p>

                    <label for="pays-population" class="text-gray-600">Country Population</label>
                    <input value="<?= $pays_population ?>" name="pays-population" id="pays-population" type="text" class="bg-gray-100 p-1" placeholder="eg: 1000300...">
                    <p id="pays-population-err" class="text-red-600 text-sm"><?= $pays_population_err ?></p>

                    <label for="pays-langues" class="text-gray-600">Country Langues</label>
                    <input value="<?= $pays_langues ?>" name="pays-langues" id="pays-langues" type="text" class="bg-gray-100 p-1" placeholder="eg: Arabic, french...">
                    <p id="pays-langues-err" class="text-red-600 text-sm"><?= $pays_langues_err ?></p>

                    <label for="id-continent" class="text-gray-600">Continent of the Country</label>
                    <select class="bg-gray-100 p-1" name="id-continent" id="id-continent">
                        <option value="" disabled>Select a Continent</option>
                        <!-- get all pays from db in this select option -->
                        <?php
                        foreach($all_continents as $continent){
                            if($continent["Id_continent"] == $country["Id_continent"])
                                echo "<option selected value='$continent[Id_continent]'>$continent[Continent_name]</option>";
                            else 
                                echo "<option value='$continent[Id_continent]'>$continent[Continent_name]</option>";
                        }
                        ?>
                    </select>
                    <p id="id-continent-err" class="text-red-600 text-sm"><?= $id_continent_err ?></p>

                    <label for="pays-image" class="text-gray-600">Select an image</label>
                    <input value="<?= $pays_image ?>" id="pays-image" name="pays-image" class="bg-gray-100 p-1" type="file">
                    <p id="pays-image-err" class="text-red-600 text-sm"><?= $pays_image_err ?></p>
                </div>

                <div class="flex gap-1 flex-wrap-reverse">
                    <input id="cancel_add_country" type="reset" class="bg-white cursor-pointer border border-black px-4" value="Reset" />
                    <input type="submit" class="bg-black text-white cursor-pointer px-8" value="Save" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>