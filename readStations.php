<?php

include ('database.php');
include ('logger.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Stations
    </title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Stations</h1>



<?php

$queryultima = "select `s`.`StationID` AS `StationID`,`s`.`StationName` AS `StationName`, `s`.`Address` AS `Address`, `cit`.`CityName` AS `CityName`, `c`.`CountryName` AS `CountryName` from (((`air_pollution`.`countries` `c` join `air_pollution`.`cities` `cit`) join `air_pollution`.`stations` `s`) join `air_pollution`.`measurments` `m`) where ((`m`.`StationsFK` = `s`.`StationID`) and (`s`.`CityFK` = `cit`.`CityID`) and (`cit`.`CountryFK` = `c`.`CountryID`))";

$query = "SELECT * FROM stations";
$result = mysqli_query($con, $queryultima);
logConsole("da vidimo", $result);
?>

<table>
    <tr>
        <th>StationID</th>
        <th>Station Name</th>
        <th>Address</th>
        <th>City Name</th>
        <th>Country Name</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td> <?php echo $row['StationID'] ?></td>
            <td> <?php echo $row['StationName'] ?></td>
            <td> <?php echo $row['Address'] ?></td>
            <td> <?php echo $row['CityName'] ?></td>
            <td> <?php echo $row['CountryName'] ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>