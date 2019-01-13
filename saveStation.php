<?php

include('database.php');

session_start();

$stationName = mysqli_real_escape_string($con, $_POST['StationName']);
$address = mysqli_real_escape_string($con, $_POST['Address']);
$cityFK = mysqli_real_escape_string($con, $_POST['cit']);

mysqli_query($con, "INSERT INTO stations (StationName, Address, CityFK) VALUES ('$stationName', '$address', '$cityFK')");

header('Location: editStations.php');
