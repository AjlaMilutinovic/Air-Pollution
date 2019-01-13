<?php
include ('database.php');
include ('logger.php');
//session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Cities Edit Mode
    </title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<h1>Cities - EDIT MODE</h1>
<h5>Warning! Deleting a city may result losing station and measurement data.</h5>

<a href="adminPage.php"><- Admin page</a>

<?php
$query = "SELECT * FROM cities";
$result = mysqli_query($con, $query);

$countriesQuery = "SELECT * FROM countries";
$countriesList = mysqli_query($con, $countriesQuery);

?>
<br><br>
<table>
    <tr>
        <th>CityID</th>
        <th>City Name</th>
<!--        <th>Country</th>-->
        <th>Country key</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td> <a> <?php echo $row['CityID'] ?> </a> </td>

            <td> <?php echo $row['CityName'] ?> </td>

<!--Pokusaj da ispise svaku pojedinacu drzavu-->
<!--            <td>-->
<!--            --><?php //while($countryrow = mysqli_fetch_assoc($countriesList)) {
//                if($countryrow['CountryID']=$row['CountryFK']) {
//                ?>
<!--                     --><?php //echo $countryrow['CountryName'] ?>
<!---->
<!--            --><?php //}} ?>
<!--            </td>-->

            <td> <?php echo $row['CountryFK'] ?> </td>

            <td>
                <a href="editCity.php?id=<?php echo $row['CityID'] ?>">Edit</a>
            </td>

            <td>
                <a href="deleteCity.php?id=<?php echo $row['CityID'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>


<h3>Add city:</h3>

<?php
$countriesQuery = "SELECT * FROM countries";
$countriesList = mysqli_query($con, $countriesQuery);
?>

<form action="saveCity.php" method="post">
    <table>
        <tr>
            <td>City name</td>
            <td><input type='text' name='CityName'/></td>
        </tr>

        <tr>
            <td>Country</td>
            <td>
            <select name="countr" id="CountriesFK">

            <option value=""> Select a country </option>
            <?php while( $countries = mysqli_fetch_assoc($countriesList)) {

//                logConsole('countr', $countries['CountryName']);

                ?>

                <option value="<?php echo $countries['CountryID'] ?>" id="test"><?php echo $countries['CountryName'] ?></option>
            <?php } ?>
            </select>

            </td>

        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit">Save</button>
            </td>
        </tr>
    </table>

</body>
</html>