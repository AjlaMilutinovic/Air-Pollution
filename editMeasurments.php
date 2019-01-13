<?php
include ('database.php');
include ('logger.php');
//session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Measurements Edit Mode
    </title>

    <link rel="stylesheet" href="styles.css">
</head>

<body class="measur">

<h1>Measurements - EDIT MODE</h1> <br>

<a href="adminPage.php"><- Admin page</a>

<?php
$query = "SELECT * FROM measurments";
$result = mysqli_query($con, $query);

?>

<table>
    <tr>
        <th>Measurment ID</th>
        <th>Pollution Index</th>
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
        <th>Station key</th>
        <th>Edit</th>
        <th>Delete</th>


    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td> <a> <?php echo $row['MeasurID'] ?> </a> </td>

            <td> <?php echo $row['PollutionIndex'] ?> </td>

            <td> <?php echo $row['PM10'] ?> </td>

            <td> <?php echo $row['O3'] ?> </td>

            <td> <?php echo $row['NO2'] ?> </td>

            <td> <?php echo $row['SO2'] ?> </td>

            <td> <?php echo $row['CO'] ?> </td>

            <td> <?php echo $row['Temp'] ?> </td>

            <td> <?php echo $row['Pressure'] ?> </td>

            <td> <?php echo $row['Humidity'] ?> </td>

            <td> <?php echo $row['Wind'] ?> </td>

            <td> <?php echo $row['TimeDate'] ?> </td>

            <td> <?php echo $row['StationsFK'] ?> </td>

            <td>
                <a href="editMeasurment.php?id=<?php echo $row['MeasurID'] ?>">Edit</a>
            </td>

            <td>
                <a href="deleteMeasurment.php?id=<?php echo $row['MeasurID'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>


<?php

$stationsQuery = "SELECT * FROM stations";
$stationsList = mysqli_query($con, $stationsQuery);

?>

<h3>Add Measurment:</h3>

<form action="saveMeasurment.php" method="post">
    <table>
        <tr><td>Pollution Index</td>
            <td><input type='number' name='PollutionIndex'/></td>
        </tr>

        <tr><td>PM10</td>
            <td><input type='number' name='PM10'/></td>
        </tr>

        <tr><td>O3</td>
            <td><input type='number' name='O3'/></td>
        </tr>

        <tr><td>NO2</td>
            <td><input type='number' name='NO2'/></td>
        </tr>

        <tr><td>SO2</td>
            <td><input type='number' name='SO2'/></td>
        </tr>

        <tr><td>CO</td>
            <td><input type='number' name='CO'/></td>
        </tr>

        <tr><td>Temperature</td>
            <td><input type='number' name='Temp'/></td>
        </tr>

        <tr><td>Pressure</td>
            <td><input type='number' name='Pressure'/></td>
        </tr>

        <tr><td>Humidity</td>
            <td><input type='number' name='Humidity'/></td>
        </tr>

        <tr><td>Wind</td>
            <td><input type='number' name='Wind'/></td>
        </tr>

        <tr><td>Station</td>
            <td>
                <select name="stat" id="StationsFK">

                    <option value=""> Select a station </option>
                    <?php while( $stations = mysqli_fetch_assoc($stationsList)) { ?>
                        <option value="<?php echo $stations['StationID'] ?>"><?php echo $stations['StationName'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr><td></td>
            <td>
                <button type="submit">Save</button>
            </td>
        </tr>
    </table>

</body>
</html>