<?php

include('database.php');

$cityID = $_GET['id'];

mysqli_query($con, 'DELETE FROM cities WHERE CityID = ' . $cityID);

header('Location: editCities.php');