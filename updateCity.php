<?php

include('database.php');

session_start();

$cityID = mysqli_real_escape_string($con, $_POST['CityID']);

$cityName = mysqli_real_escape_string($con, $_POST['CityName']);

mysqli_query($con, "UPDATE cities SET CityName = '$cityName' WHERE CityID = " . $cityID);

header('Location: editCities.php');