<?php
include('database.php');
?>

<!doctype html>
<html>
<head>
    <title>
        Edit City
    </title>
</head>
<body>

<?php
//$cityQuery = mysqli_query($con, 'SELECT * FROM cities WHERE CityID = ' . $cityId);
$cityId = $_GET['id'];
$cityQuery = mysqli_query($con, "SELECT * FROM cities WHERE CityID =" . $cityId);
$cityFields = mysqli_fetch_assoc($cityQuery);

?>

<form method="post" action="updateCity.php?id=<?php echo $cityId; ?>">
    <input type="hidden" name="CityID" value="<?php echo $cityId ?>">
    <label for="ime">Edit city name: </label>
    <input type="text" name="CityName" id="ime" required value="<?php echo $cityFields['CityName'] ?>">
    <button type="submit">Submit</button>
</form>


</body>
</html>