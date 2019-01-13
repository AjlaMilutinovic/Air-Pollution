<?php

include ('database.php');
include ('logger.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Cities
    </title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Cities</h1>

<?php

$queryultima = "SELECT `cit`.`CityID`, `cit`.`CityName`, `c`.`CountryName` from cities cit, countries c where cit.CountryFK=c.CountryID ORDER BY `c`.`CountryName`";

$query = "SELECT * FROM cities";
$result = mysqli_query($con, $queryultima);
logConsole("da vidimo", $result);
?>

<table>
    <tr>
<!--        <th>CityID</th>-->
        <th>City Name</th>
        <th>Country Name</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)){ ?>
<!--        <tr><td> --><?php ////echo $row['CityID'] ?><!--</td>-->
            <td> <?php echo $row['CityName'] ?></td>
            <td> <?php echo $row['CountryName'] ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>