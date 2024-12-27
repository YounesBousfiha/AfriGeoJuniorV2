<?php 
include '../../controllers/adminController.php';
include '../../config/db.php';

// Initialize database connection
$db = new DBConnection();

// Create an instance of AdminController
$adminController = new AdminController($db);

// Fetch statistics
$villesInPays = $adminController->CountVillesInPays();
$paysPerContinent = $adminController->CountPaysPerContinent();
$populationPerContinent = $adminController->CountPopulationPerContinent();
$maxPopulation = $adminController->GetMaxPopulation();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
</head>
<body>
    <h1>Statistics</h1>
    
    <h2>Number of Cities in Each Country</h2>
    <ul>
        <?php foreach ($villesInPays as $row): ?>
            <li><?php echo $row['Nom_pays'] . ': ' . $row['COUNT(*)']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Number of Countries per Continent</h2>
    <ul>
        <?php foreach ($paysPerContinent as $row): ?>
            <li><?php echo $row['Continent_name'] . ': ' . $row['count(*)']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Population per Continent</h2>
    <ul>
        <?php foreach ($populationPerContinent as $row): ?>
            <li><?php echo $row['Continent_name'] . ': ' . $row['Population']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Country with Maximum Population</h2>
    <ul>
        <?php foreach ($maxPopulation as $row): ?>
            <li><?php echo $row['Nom_pays'] . ': ' . $row['Population']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>