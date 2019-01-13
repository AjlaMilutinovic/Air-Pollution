<?php

include('database.php');

$measurID = $_GET['id'];

mysqli_query($con, 'DELETE FROM measurments WHERE MeasurID = ' . $measurID);

header('Location: editMeasurments.php');