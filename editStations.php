<?php
include ('database.php');
include ('logger.php');
//session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Stations Edit Mode
    </title>

    <link rel="stylesheet" href="styles.css">
</head>

<body>

<h1>Stations - EDIT MODE</h1>
<h5>Warning! Deleting a city may result losing station and measurement data.</h5>

<a href="adminPage.php"><- Admin page</a>

<?php
$query = "SELECT * FROM stations";
$result = mysqli_query($con, $query);

$citiesQuery = "SELECT * FROM cities";
$citiesList = mysqli_query($con, $citiesQuery);

?>
<br><br>
<table>
    <tr>
        <th>StationID</th>
        <th>Station Name</th>
        <th>Address</th>
<!--        <th>City</th>-->
        <th>City key</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td> <a> <?php echo $row['StationID'] ?> </a> </td>

            <td> <?php echo $row['StationName'] ?> </td>

            <td> <?php echo $row['Address'] ?> </td>

            <!--Pokusaj da ispise svaku pojedinacu drzavu-->
            <!--            <td>-->
            <!--            --><?php //while($countryrow = mysqli_fetch_assoc($countriesList)) {
            //                if($countryrow['CountryID']=$row['CountryFK']) {
            //                ?>
            <!--                     --><?php //echo $countryrow['CountryName'] ?>
            <!---->
            <!--            --><?php //}} ?>
            <!--            </td>-->

            <td> <?php echo $row['CityFK'] ?> </td>

            <td>
                <a href="editStation.php?id=<?php echo $row['StationID'] ?>">Edit</a>
            </td>

            <td>
                <a href="deleteStation.php?id=<?php echo $row['StationID'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>


<h3>Add city:</h3>

<form action="saveStation.php" method="post">
    <table>
        <tr><td>Station name</td>
            <td><input type='text' name='StationName'/></td>
        </tr>

        <tr><td>Address</td>
            <td><input type='text' name='Address'/></td>
        </tr>

        <tr><td>City</td>
            <td>
                <select name="cit" id="CitiesFK">

                    <option value=""> Select a city </option>
                    <?php while( $cities = mysqli_fetch_assoc($citiesList)) { ?>
                        <option value="<?php echo $cities['CityID'] ?>"><?php echo $cities['CityName'] ?></option>
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