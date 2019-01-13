<?php
include('database.php');
?>

<!doctype html>
<html>
<head>
    <title>
        Edit Measurment
    </title>
</head>
<body>

<?php
//$cityQuery = mysqli_query($con, 'SELECT * FROM cities WHERE CityID = ' . $cityId);
$measurmentId = $_GET['id'];
$measurmentQuery = mysqli_query($con, "SELECT * FROM measurments WHERE MeasurID =" . $measurmentId);
$measurmentFields = mysqli_fetch_assoc($measurmentQuery);

?>

<form method="post" action="updateMeasurment.php?id=<?php echo $measurmentId; ?>">

    <input type="hidden" name="MeasurID" value="<?php echo $measurmentId ?>">

    <label for="index">Edit pollution index: </label>
    <input type="number" name="PollutionIndex" id="index" required value="<?php echo $measurmentFields['PollutionIndex'] ?>"><br>

    <label for="ime">Edit PM10: </label>
    <input type="number" name="Address" id="adresa" required value="<?php echo $measurmentFields['PM10'] ?>"><br>

    <label for="o3">Edit O3: </label>
    <input type="number" name="O3" id="o3" required value="<?php echo $measurmentFields['O3'] ?>"><br>

    <label for="no2">Edit NO2: </label>
    <input type="number" name="NO2" id="no2" required value="<?php echo $measurmentFields['NO2'] ?>"><br>

    <label for="so2">Edit SO2: </label>
    <input type="number" name="SO2" id="so2" required value="<?php echo $measurmentFields['SO2'] ?>"><br>

    <label for="co">Edit CO: </label>
    <input type="number" name="CO" id="co" required value="<?php echo $measurmentFields['CO'] ?>"><br>

    <label for="temp">Edit Temperature: </label>
    <input type="number" name="Temp" id="temp" required value="<?php echo $measurmentFields['Temp'] ?>"><br>

    <label for="pressure">Edit Pressure: </label>
    <input type="number" name="Pressure" id="pressure" required value="<?php echo $measurmentFields['Pressure'] ?>"><br>

    <label for="humidity">Edit Humidity: </label>
    <input type="number" name="Humidity" id="humidity" required value="<?php echo $measurmentFields['Humidity'] ?>"><br>

    <label for="wind">Edit Wind: </label>
    <input type="number" name="Wind" id="wind" required value="<?php echo $measurmentFields['Wind'] ?>"><br>

    <button type="submit">Submit</button>
</form>


</body>
</html>