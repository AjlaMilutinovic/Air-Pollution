<?php

include('database.php');


$element = $_POST['measur'];
$station = $_POST['stat'];

$result = mysqli_query($con, "SELECT AVG(measurments.$element)
FROM       stations, measurments
WHERE      stations.StationID = measurments.StationsFK AND stations.StationName='$station'");

echo "The average value for " . $element . " for station " . $station . " is ";

while($row = mysqli_fetch_array($result))
{
    print_r($row[0]);
}

//header('Location: queries/averageBetweenDate.php');