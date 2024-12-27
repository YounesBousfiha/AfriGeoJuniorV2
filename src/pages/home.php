<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Africa Géo-Junior | Versoin 2</title>
    <link rel="stylesheet" href="../assets/css/input.css?version=1">
    <link rel="stylesheet" href="../assets/css/output.css?v=1">
    <link rel="stylesheet" href="../assets/css/africa.css?v=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../assets/js/africa.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <script src="../assets/js/africa.js" defer></script>
</head>
<body class="font-[Oswald]">
    <!-- <?php include"../config/connection.php"; ?> -->
    
    <div class="flex flex-col min-h-[100vh]">
        <?php include"../assets/components/navigation.php"; ?>
        <div class="flex-grow flex flex-col">
            <section class="relative">
                <img class="h-[85vh] w-full object-cover" src="https://cdn.bunniktours.com.au/public/posts/January2024/Halong%20Bay%20by%20Kristi%20Rutten%20-%20IMG_2458.jpg" alt="">
                <div class="absolute top-0 bottom-0 w-full flex items-end justify-center">
                    <div class="flex justify-center items-center flex-col w-full pb-12 bg-gradient-to-b from-transparent to-black">
                        <p class="text-5xl text-white p-4">The World's Wonders</p>
                        <p class="text-white text-2xl w-2/3 max-lg:w-full px-4 text-center">
                        Each continent offers unique treasures, from Africa's vibrancy and Antarctica's serenity to Asia’s traditions, Europe’s charm, and the beauty of the Americas and Australia. The world invites endless exploration.
                        </p>
                    </div>
                </div>
            </section>
            
            <div class="p-6 flex justify-center items-center bg-gray-100">
                <a href="#" class="bg-black px-6 py-2 text-white rounded-md">Explore The Africa Country and cites !</a>
            </div>

            <div class="flex justify-center items-center bg-white p-6 overflow-hidden">
                <?php include"../assets/components/africa.php"; ?>
            </div>
        </div>
        <?php include "../assets/components/footer.php"; ?>
    </div>

</body>
</html>