<?php

include('database.php');

session_start();

$countryID = mysqli_real_escape_string($con, $_GET['CountryID']);

mysqli_query($con, "SELECT * FROM countries WHERE CountryID='$countryID'");

$_SESSION['CountryID']=$countryID;

header('Location: linksCities.php?CityID='.$countryID);
