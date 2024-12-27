<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore The World</title>
    <link rel="stylesheet" href="../assets/css/input.css">
    <link rel="stylesheet" href="../assets/css/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body class="font-[Oswald]">
    <div id="background" class="flex flex-col min-h-[100vh]">
        <?php 
            include "../assets/components/navigation.php";
        ?>
    
        <div class="flex-grow py-4 px-10 max-sm:px-2">
            <section class="flex flex-col gap-4">
                <div class="flex justify-between items-center relative">
                    <h1 class="text-2xl font-bold">Countries</h1>
                    <!-- <img src="../assets/images/icons/filter.svg" class="size-5 cursor-pointer" id="filter-continent-icon" alt="">
                    <div class="absolute right-0 top-[100%] bg-white shadow-xl hidden flex-col" id="filter-continent-items">
                        <p class="hover:bg-gray-100 pr-24 pl-2">All</p>
                        <p class="hover:bg-gray-100 pr-24 pl-2">Africa</p>
                        <p class="hover:bg-gray-100 pr-24 pl-2">Europe</p>
                        <p class="hover:bg-gray-100 pr-24 pl-2">Asia</p>
                        <p class="hover:bg-gray-100 pr-24 pl-2">America</p>
                    </div> -->
                </div>
                <div class="flex gap-4 flex-wrap justify-start flex-grow max-h-[76vh] overflow-auto [&::-webkit-scrollbar]:hidden">
                    <?php 
                        for($i=0; $i<12; $i++){
                            echo "<div class='w-[24.2%] max-xl:w-[31.6%] max-lg:w-[32%] max-[868px]:w-[48.5%] max-md:w-[100%]'>
                                <a href=" . "'./country-details.php?country=". "Morocco" . "'>
                                    <img src='https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg' class='h-[200px] object-cover w-full'>
                                </a>
                                <div class='flex items-center justify-between'>
                                    <p class='text-lg font-bold'>". "Morocco" .", ". "Africa" ."</p>
                                    <p class='text-gray-400 text-sm'>". "36.000.000" ." people</p>
                                </div>
                                <p class='text-gray-500 text-xs'>Langues: ". "Arabic, Tamazight" ."</p>
                                <p class='text-gray-700 text-sm'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam corrupti error deserunt. Quis modi sapiente voluptatum adipisci omnis rem culpa veniam, itaque nulla officia nisi?</p>
                            </div>";
                        }
                    ?>
                </div>
            </section>
        </div>
    
        <?php include "../assets/components/footer.php"; ?>
    </div>
    
</body>
</html>