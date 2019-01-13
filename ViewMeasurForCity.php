<?php

    include ('database.php');

    $city = $_POST['cit'];

$result = mysqli_query($con, "SELECT *
FROM          (cities
INNER JOIN      stations ON cities.CityID = stations.CityFK)
INNER JOIN      measurments ON stations.StationID = measurments.StationsFK
WHERE cities.cityName='$city'");

?>

<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<br>
<h3>You are viewing measurment data for <?php echo "$city" ?></h3>

<table>
        <tr>
            <th>ID</th>
            <th>PM10</th>
            <th>O3</th>
            <th>NO2</th>
            <th>SO2</th>
            <th>CO</th>
            <th>Temperature</th>
            <th>Pressure</th>
            <th>Humidity</th>
            <th>Wind</th>
            <th>Time</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <tr><td> <?php echo $row['MeasurID'] ?></td>
                <td> <?php echo $row['PM10'] ?></td>
                <td> <?php echo $row['O3'] ?></td>
                <td> <?php echo $row['NO2'] ?></td>
                <td> <?php echo $row['SO2'] ?></td>
                <td> <?php echo $row['CO'] ?></td>
                <td> <?php echo $row['Temp'] ?></td>
                <td> <?php echo $row['Pressure'] ?></td>
                <td> <?php echo $row['Humidity'] ?></td>
                <td> <?php echo $row['Wind'] ?></td>
                <td> <?php echo $row['TimeDate'] ?></td>


            </tr>
        <?php } ?>
    </table>

</body>
</html>