<?php

include('database.php');

session_start();

$stationID = mysqli_real_escape_string($con, $_POST['StationID']);

$stationName = mysqli_real_escape_string($con, $_POST['StationName']);

$address = mysqli_real_escape_string($con, $_POST['Address']);

mysqli_query($con, "UPDATE stations SET StationName = '$stationName', Address = '$address' WHERE StationID = " . $stationID);

header('Location: editStations.php');