<?php

include ('database.php');
include ('logger.php');
session_start();
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>
            Measurements
        </title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>

    <h1>Measurments</h1>

    <?php
    $query = "SELECT * FROM measurments";
    $result = mysqli_query($con, $query);
    logConsole("da vidimo", $result);
    ?>

    <table>
        <tr>
            <th>ID</th>
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
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <tr><td> <?php echo $row['MeasurID'] ?></td>
                <td> <?php echo $row['PollutionIndex'] ?></td>
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
                <td>

<!--                    --><?php
//
//                        $station = "SELECT StationName FROM stations WHERE "
//
//                    ?>

                </td>

            </tr>
        <?php } ?>
    </table>

    </body>
    </html>