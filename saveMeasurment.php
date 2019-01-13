<?php

include('database.php');

session_start();

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
$timedateofCreation = date('Y-m-d H:i:s');
$stationFK = mysqli_real_escape_string($con, $_POST['stat']);

mysqli_query($con, "INSERT INTO measurments (PollutionIndex, PM10, O3, NO2, SO2, CO, Temp, Pressure, Humidity, Wind, TimeDate, StationsFK)  VALUES ('$pollutionIndex', '$PM10', '$O3', '$NO2', '$SO2', '$CO', '$temp', '$pressure', '$humidity', '$wind', '$timedateofCreation', '$stationFK')");

header('Location: editMeasurments.php');
