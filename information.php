<?php
include ('database.php');
include ('logger.php');
//session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        More Information
    </title>
<!--    <link rel="stylesheet" href="styles.css">-->

    <link rel="stylesheet" href="styles.css">
</head>

<body>

<h2>View Average</h2>

<h3>Average for measurements between a specific date: </h3>

    <form action="queries/averageBetweenDate.php" method="post">
        <table>
        <tr>
            <td>Choose measurement: </td>
            <td>

<!--                <input type='text' name='measur' /> -->

                <select name="measur" id="measur">
                    <option value=""> Select a measurment </option>
                    <option value="PollutionIndex"> Pollution Index </option>
                    <option value="PM10"> PM10 </option>
                    <option value="O3"> O3 </option>
                    <option value="NO2"> NO2 </option>
                    <option value="SO2"> SO2 </option>
                    <option value="CO"> CO </option>
                    <option value="Temp"> Temperature </option>
                    <option value="Pressure"> Pressure </option>
                    <option value="Humidity"> Humidity </option>
                    <option value="Wind"> Wind </option>
                </select>

            <br>
            </td></tr>

        <tr>
            <td>Choose beginning day: </td>
            <td> <input type='date' name='beg' /><br> </td></tr>

        <tr>
            <td> Choose ending day: </td>
            <td> <input type='date' name='end' /><br> </td></tr>

        <tr><td></td>
            <td>
                <button type="submit">View</button>
            </td></tr>
</table>
</form>

<?php
$countriesQuery = "SELECT * FROM countries";
$countriesList = mysqli_query($con, $countriesQuery);
?>

<h3>Average by Country</h3>
<form action="queries/averageCountry.php" method="post">
<table>
    <tr>
        <td>Choose measurement: </td>
        <td>

            <!--                <input type='text' name='measur' /> -->

            <select name="measur" id="measur">
                <option value=""> Select a measurment </option>
                <option value="PollutionIndex"> Pollution Index </option>
                <option value="PM10"> PM10 </option>
                <option value="O3"> O3 </option>
                <option value="NO2"> NO2 </option>
                <option value="SO2"> SO2 </option>
                <option value="CO"> CO </option>
                <option value="Temp"> Temperature </option>
                <option value="Pressure"> Pressure </option>
                <option value="Humidity"> Humidity </option>
                <option value="Wind"> Wind </option>
            </select>

            <br>
        </td></tr>

    <tr>
        <td>Choose country: </td>
        <td>

            <select name="countr" id="CountriesFK">

                <option value=""> Select a country </option>
                <?php while( $countries = mysqli_fetch_assoc($countriesList)) {?>

                    <option value="<?php echo $countries['CountryName'] ?>" id="test"><?php echo $countries['CountryName'] ?></option>
                <?php } ?>
            </select>

            <br>
        </td></tr>

        <tr><td></td>
        <td>    <button type="submit">View</button>
        </td></tr>
</table>
</form>


<?php
$citiesQuery = "SELECT * FROM cities";
$citiesList = mysqli_query($con, $citiesQuery);
?>

<h3>Average by City</h3>
<form action="queries/averageCity.php" method="post">
    <table>
        <tr>
            <td>Choose measurement: </td>
            <td>

                <select name="measur" id="measur">
                    <option value=""> Select a measurment </option>
                    <option value="PollutionIndex"> Pollution Index </option>
                    <option value="PM10"> PM10 </option>
                    <option value="O3"> O3 </option>
                    <option value="NO2"> NO2 </option>
                    <option value="SO2"> SO2 </option>
                    <option value="CO"> CO </option>
                    <option value="Temp"> Temperature </option>
                    <option value="Pressure"> Pressure </option>
                    <option value="Humidity"> Humidity </option>
                    <option value="Wind"> Wind </option>
                </select>

                <br>
            </td></tr>

        <tr>
            <td>Choose city: </td>
            <td>

                <select name="cit" id="CitiesFK">

                    <option value=""> Select a city </option>
                    <?php while( $cities = mysqli_fetch_assoc($citiesList)) {?>

                        <option value="<?php echo $cities['CityName'] ?>" id="test"><?php echo $cities['CityName'] ?></option>
                    <?php } ?>
                </select>

                <br>
            </td></tr>

        <tr><td></td>
            <td>    <button type="submit">View</button>
            </td></tr>
    </table>
</form>


<?php
$stationsQuery = "SELECT * FROM stations";
$stationsList = mysqli_query($con, $stationsQuery);
?>

<h3>Average by Stations</h3>
<form action="queries/averageStation.php" method="post">
    <table>
        <tr>
            <td>Choose measurement: </td>
            <td>

                <select name="measur" id="measur">
                    <option value=""> Select a measurment </option>
                    <option value="PollutionIndex"> Pollution Index </option>
                    <option value="PM10"> PM10 </option>
                    <option value="O3"> O3 </option>
                    <option value="NO2"> NO2 </option>
                    <option value="SO2"> SO2 </option>
                    <option value="CO"> CO </option>
                    <option value="Temp"> Temperature </option>
                    <option value="Pressure"> Pressure </option>
                    <option value="Humidity"> Humidity </option>
                    <option value="Wind"> Wind </option>
                </select>

                <br>
            </td></tr>

        <tr>
            <td>Choose station: </td>
            <td>

                <select name="stat" id="StationsFK">

                    <option value=""> Select a station </option>
                    <?php while( $stations = mysqli_fetch_assoc($stationsList)) {?>

                        <option value="<?php echo $stations['StationName'] ?>" id="test"><?php echo $stations['StationName'] ?></option>
                    <?php } ?>
                </select>

                <br>
            </td></tr>

        <tr><td></td>
            <td>    <button type="submit">View</button>
            </td></tr>
    </table>
</form>

<h2>View minimum and maximum values</h2>
<h3>Min and Max for station between a specific date</h3>

<?php
$stationsQuery = "SELECT * FROM stations";
$stationsList = mysqli_query($con, $stationsQuery);
?>

<form action="queries/minmax.php" method="post">
    <table>
        <tr>
            <td>Choose measurement: </td>
            <td>

                <!--                <input type='text' name='measur' /> -->

                <select name="measur" id="measur">
                    <option value=""> Select a measurment </option>
                    <option value="PollutionIndex"> Pollution Index </option>
                    <option value="PM10"> PM10 </option>
                    <option value="O3"> O3 </option>
                    <option value="NO2"> NO2 </option>
                    <option value="SO2"> SO2 </option>
                    <option value="CO"> CO </option>
                    <option value="Temp"> Temperature </option>
                    <option value="Pressure"> Pressure </option>
                    <option value="Humidity"> Humidity </option>
                    <option value="Wind"> Wind </option>
                </select>

                <br>
            </td></tr>

        <tr>
            <td>Choose station: </td>
            <td>

                <select name="stat" id="StationsFK">

                    <option value=""> Select a station </option>
                    <?php while( $stations = mysqli_fetch_assoc($stationsList)) {?>

                        <option value="<?php echo $stations['StationID'] ?>" id="test"><?php echo $stations['StationName'] ?></option>
                    <?php } ?>
                </select>

                <br>
            </td></tr>

        <tr>


        <tr>
            <td>Choose beginning day: </td>
            <td> <input type='date' name='beg' /><br> </td></tr>

        <tr>
            <td> Choose ending day: </td>
            <td> <input type='date' name='end' /><br> </td></tr>

        <tr><td></td>
            <td>
                <button type="submit">View</button>
            </td></tr>
    </table>
</form>

<h2>Count</h2>
<h3>View number of </h3>


</body>
</html>