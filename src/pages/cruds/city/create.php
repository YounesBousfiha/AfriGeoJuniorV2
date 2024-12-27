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
                    <input name="city-name" id="city-name" type="text" class="bg-gray-100 p-1" placeholder="eg: Meknes, Fes...">
                    <!-- <p id="city-name-errMssg" class="text-red-600 bg-red-50 px-1 text-sm">This field is Required...</p> -->

                    <label for="city-type" class="text-gray-600">City Type</label>
                    <select name="city-type" id="city-type" class="bg-gray-100 p-1">
                        <option value="" selected disabled>Select a Type</option>
                        <option value="Capital">Capital</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <!-- <p id="city-type-errMssg" class="text-red-600 bg-red-50 px-1 text-sm">This field is Required...</p> -->

                    <label for="city-country" class="text-gray-600">Country of City</label>
                    <select name="city-country" id="city-country" class="bg-gray-100 p-1">
                        <option value="" selected disabled>Select a Country</option>
                        <!-- <?php
                        
                        ?> -->
                    </select>
                    <!-- <p id="city-type-errMssg" class="text-red-600 bg-red-50 px-1 text-sm">This field is Required...</p> -->

                    <label for="city-image" class="text-gray-600">Select an image</label>
                    <input id="city-image" name="city-image" class="bg-gray-100 p-1" type="file">
                </div>

                <div class="flex gap-1 flex-wrap-reverse">
                    <input id="cancel_add_city" type="reset" class="bg-white cursor-pointer border border-black px-4" value="Reset" />
                    <input type="submit" class="bg-black text-white cursor-pointer px-8" value="Create" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>