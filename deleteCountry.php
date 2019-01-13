<?php

include('database.php');

$countryID = $_GET['id'];

mysqli_query($con, 'DELETE FROM countries WHERE CountryID = ' . $countryID);

header('Location: editCountries.php');