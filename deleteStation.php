<?php

include('database.php');

$stationID = $_GET['id'];

mysqli_query($con, 'DELETE FROM stations WHERE StationID = ' . $stationID);

header('Location: editStations.php');