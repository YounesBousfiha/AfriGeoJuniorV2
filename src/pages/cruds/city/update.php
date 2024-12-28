<?php

include '../../../../config/db.php';
include '../../../../controllers/AdminController.php';

$id_city = $_GET["id_city"];

$db = new DBConnection();
$admin = new AdminController($db);
$city = $admin->getByIdVille($id_city);
$all_countries = $admin->getAllPays();

$city_nom = $city["Nom_ville"];
$city_type = $city["Type_Ville"];
$id_pays = $city["Id_pays"];
$city_image = $city["Image"];
// errors variables
$city_nom_err = "";
$city_type_err = "";
$id_pays_err = "";
$city_image_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city_nom = $_POST["city-name"];
    $city_type = $_POST["city-type"];
    $id_pays = $_POST["city-country"];
    $city_image = $_POST["city-image"];

    if (empty($city_nom)) $city_nom_err = "City name is required...";
    if (empty($city_type)) $city_type_err = "City type is required...";
    if (empty($id_pays)) $id_pays_err = "City country is required...";
    if (empty($city_image)) $city_image_err = "City image continent is required...";
    
    if (!empty($city_nom) && !empty($city_type) && !empty($id_pays) && !empty($city_image)) {
        session_start();
        $_SESSION["city-id"] = $id_city;
        $_SESSION["city-nom"] = $city_nom;
        $_SESSION["city-type"] = $city_type;
        $_SESSION["id-pays"] = $id_pays;
        $_SESSION["city-image"] = $city_image;

        var_dump($city_nom);

        header("location: ../../../../pages/ville/update_ville.php");
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
            <a href="../../cities-list.php" class="hover:underline cursor-pointer">Back to Dashboard page</a>
        </div>

        <div class="flex-grow flex justify-center items-center w-full">
            <form method="post" action="" class="bg-white min-h-[400px] w-1/2 max-md:h-auto max-lg:w-3/5 max-md:w-4/5 max-sm:w-full max-sm:h-[98%] max-sm:m-2 shadow-lg flex flex-col p-4 gap-2">
                <div class="flex flex-col py-4">
                    <h1 class="text-xl font-medium">City Informations</h1>
                    <p class="text-gray-400 text-sm">Fill the inputs with a Valid data to create a new record in your Database</p>
                </div>

                <div class="flex-grow flex flex-col text-sm gap-1 mb-4">
                    <label for="city-name" class="text-gray-600">City name</label>
                    <input value="<?= $city_nom ?>" name="city-name" id="city-name" type="text" class="bg-gray-100 p-1" placeholder="eg: Meknes, Fes...">
                    <p id="city-name-errMssg" class="text-red-600 text-sm"><?= $city_nom_err ?></p>

                    <label for="city-type" class="text-gray-600">City Type</label>
                    <select name="city-type" id="city-type" class="bg-gray-100 p-1">
                        <option value="Capital">Capital</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <p id="city-type-errMssg" class="text-red-600 text-sm"><?= $city_type_err ?></p>

                    <label for="city-country" class="text-gray-600">Country of City</label>
                    <select name="city-country" id="city-country" class="bg-gray-100 p-1">
                        <option value="" selected disabled>Select a Country</option>
                        <?php
                        foreach($all_countries as $country){
                            if($city["Id_pays"] == $country["Id_pays"])
                                echo "<option selected value='$country[Id_pays]'>$country[Nom_pays]</option>";
                            else 
                                echo "<option value='$country[Id_pays]'>$country[Nom_pays]</option>";
                        }
                        ?>
                    </select>
                    <p id="city-type-errMssg" class="text-red-600 text-sm"><?= $id_pays_err ?></p>

                    <label for="city-image" class="text-gray-600">Select an image</label>
                    <input value="<?= $city_image ?>" id="city-image" name="city-image" class="bg-gray-100 p-1" type="file">
                    <p id="city-type-errMssg" class="text-red-600 text-sm"><?= $city_image_err ?></p>
                </div>

                <div class="flex gap-1 flex-wrap-reverse">
                    <input id="cancel_add_city" type="reset" class="bg-white cursor-pointer border border-black px-4" value="Reset" />
                    <input type="submit" class="bg-black text-white cursor-pointer px-8" value="Save" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>