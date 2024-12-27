<?php
$continent_name = "";
$continent_name_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $continent_name = $_POST["continent-name"];
    if (empty($continent_name)) $continent_name_err = "This field is Required...";
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
                    <label for="country-name" class="text-gray-600">Country name</label>
                    <input name="country-name" id="country-name" type="text" class="bg-gray-100 p-1" placeholder="eg: Morocco, Egypt...">
                    <!-- <p id="country-name-errMssg" class="text-red-600 bg-red-50 px-1 text-sm">This field is Required...</p> -->

                    <label for="country-population" class="text-gray-600">Country Population</label>
                    <input name="country-population" id="country-population" type="text" class="bg-gray-100 p-1" placeholder="eg: 1000300...">
                    <!-- <p id="continent-population-errMssg" class="text-red-600 bg-red-50 px-1 text-sm">This field is Required...</p> -->

                    <label for="country-langue" class="text-gray-600">Country Langues</label>
                    <input name="country-langue" id="country-langue" type="text" class="bg-gray-100 p-1" placeholder="eg: Arabic, french...">
                    <!-- <p id="continent-langue-errMssg" class="text-red-600 bg-red-50 px-1 text-sm">This field is Required...</p> -->

                    <label for="country-continent" class="text-gray-600">Continent of the Country</label>
                    <select class="bg-gray-100 p-1" name="continent-continent" id="continent-country">
                        <option value="" disabled selected>Select a Continent</option>
                        <!-- make all continents from db in this select option -->
                    </select>

                    <label for="country-image" class="text-gray-600">Select an image</label>
                    <input id="country-image" class="bg-gray-100 p-1" type="file">
                </div>

                <div class="flex gap-1 flex-wrap-reverse">
                    <input id="cancel_add_country" type="reset" class="bg-white cursor-pointer border border-black px-4" value="Reset" />
                    <input type="submit" class="bg-black text-white cursor-pointer px-8" value="Create" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>