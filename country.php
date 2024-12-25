<?php

include './db.php';
include './countryModel.php';
include './countryController.php';

$db = new DBConnection();

$CountryController = new CountryController($db);

$country = new Country('Morroco', '400');

$CountryController->create($country->getName(), $country->getPopulation());





?>