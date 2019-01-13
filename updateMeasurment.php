<?php

include('database.php');

session_start();

$measurmentID = mysqli_real_escape_string($con, $_POST['MeasurID']);
$pollutionIndex = mysqli_real_escape_string($con, $_POST['PollutionIndex']);
$PM10 = mysqli_real_escape_string($con, $_POST['PM10']);
$O3 = mysqli_real_escape_string($con, $_POST['O3']);
$NO2 = mysqli_real_escape_string($con, $_POST['NO2']);
$SO2 = mysqli_real_escape_string($con, $_POST['SO2']);
$CO = mysqli_real_escape_string($con, $_POST['CO']);
$temp= mysqli_real_escape_string($con, $_POST['Temp']);
$pressure = mysqli_real_escape_string($con, $_POST['Pressure']);
$humidity = mysqli_real_escape_string($con, $_POST['Humidity']);
$wind = mysqli_real_escape_string($con, $_POST['Wind']);
//$timedateofCreation = date('Y-m-d H:i:s');
$stationFK = mysqli_real_escape_string($con, $_POST['stat']);


mysqli_query($con, "UPDATE measurments SET PollutionIndex = '$pollutionIndex', PM10 = '$PM10', O3 = '$O3', NO2 = '$NO2', SO2 = '$SO2', CO='$CO', Temp='$temp', Pressure='$pressure', Humidity = '$humidity', Wind = '$wind'  WHERE MeasurID = " . $measurmentID);

header('Location: editMeasurments.php');