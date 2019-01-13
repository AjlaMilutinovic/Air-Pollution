<?php
include('database.php');
?>

<!doctype html>
<html>
<head>
    <title>
        Edit Station
    </title>
</head>
<body>

<?php
//$cityQuery = mysqli_query($con, 'SELECT * FROM cities WHERE CityID = ' . $cityId);
$stationId = $_GET['id'];
$stationQuery = mysqli_query($con, "SELECT * FROM stations WHERE StationID =" . $stationId);
$stationFields = mysqli_fetch_assoc($stationQuery);

?>

<form method="post" action="updateStation.php?id=<?php echo $stationId; ?>">
    <input type="hidden" name="StationID" value="<?php echo $stationId ?>">
    <label for="ime">Edit city name: </label>
    <input type="text" name="StationName" id="ime" required value="<?php echo $stationFields['StationName'] ?>">
    <label for="ime">Edit Address: </label>
    <input type="text" name="Address" id="adresa" required value="<?php echo $stationFields['Address'] ?>">
    <button type="submit">Submit</button>
</form>


</body>
</html>