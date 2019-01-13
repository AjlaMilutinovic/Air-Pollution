<?php

include('database.php');
include ('logger.php');

session_start();

$cityName = mysqli_real_escape_string($con, $_POST['CityName']);
$countryFK = mysqli_real_escape_string($con, $_POST['countr']);

logConsole('cityName', $cityName);
logConsole('countryFK', $countryFK);


mysqli_query($con, "INSERT INTO cities (CityName, CountryFK) VALUES ('$cityName', '$countryFK')");


header('Location: editCities.php');
