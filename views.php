<?php

include('database.php');

$highest = mysqli_query($con, "SELECT * FROM highestpollution");
$lowest = mysqli_query($con, "SELECT * FROM lowestpollution");

?>

<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<br>

<h4>Highest polluted cities in last 24 hours</h4>

<table>
    <tr>
        <th>Country Name</th>
        <th>City Name</th>
        <th>Station Name</th>
        <th>Pollution Index</th>
    </tr>


    <?php while($row = mysqli_fetch_assoc($highest)){ ?>
        <tr><td> <?php echo $row['CountryName'] ?></td>
            <td> <?php echo $row['CityName'] ?></td>
            <td> <?php echo $row['StationName'] ?></td>
            <td> <?php echo $row['PollutionIndex'] ?></td>
        </tr>
    <?php } ?>
</table>
<br>
<h4>Lowest polluted cities in last 24 hours</h4>
<table>
    <tr>
        <th>Country Name</th>
        <th>City Name</th>
        <th>Station Name</th>
        <th>Pollution Index</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($lowest)){ ?>
        <tr><td> <?php echo $row['CountryName'] ?></td>
            <td> <?php echo $row['CityName'] ?></td>
            <td> <?php echo $row['StationName'] ?></td>
            <td> <?php echo $row['PollutionIndex'] ?></td>
        </tr>
    <?php } ?>
</table>


<?php

$element = $_POST['measur'];
$country = $_POST['countr'];

$result = mysqli_query($con, "SELECT AVG(measurments.$element)
FROM          ((countries 
INNER JOIN      cities ON countries.CountryID = cities.CountryFK)
INNER JOIN      stations ON cities.CityID = stations.CityFK)
INNER JOIN      measurments ON stations.StationID = measurments.StationsFK
WHERE countries.countryName='$country'");

echo "The average value for " . $element . " for country " . $country . " is ";

while($row = mysqli_fetch_array($result))
{
    print_r($row[0]);
}

?>

</body>

</html>