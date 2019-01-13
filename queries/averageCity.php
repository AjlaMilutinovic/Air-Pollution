<?php

include('database.php');


$element = $_POST['measur'];
$city = $_POST['cit'];

$result = mysqli_query($con, "SELECT AVG(measurments.PollutionIndex)
FROM          ((countries 
INNER JOIN      cities ON countries.CountryID = cities.CountryFK)
INNER JOIN      stations ON cities.CityID = stations.CityFK)
INNER JOIN      measurments ON stations.StationID = measurments.StationsFK
WHERE countries.countryName='$country'");

echo "The average value for " . $element . " for city " . $city . " is ";

while($row = mysqli_fetch_array($result))
{
    print_r($row[0]);
}

//header('Location: queries/averageBetweenDate.php');