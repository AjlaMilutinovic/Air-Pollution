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

<h1>Choose station</h1>

<a href="linksCities.php"><- Cities</a><br><br>

<?php

$selected = $_GET['CityID'];
logConsole("SELECTED", $selected);

$queryultima = "SELECT `s`.`StationID`, `s`.`StationName`, `cit`.`CityName` from cities cit, stations s where s.CityFK=cit.CityID and cit.CityID='$selected'  ORDER BY `s`.`StationName`";

logConsole("get", $queryultima);

$result = mysqli_query($con, $queryultima);
logConsole("da vidimo", $result);
?>

<table>
    <tr>
        <!--        <th>CityID</th>-->
        <th>Station Name</th>
        <th>City Name</th>
        <th>Bookmark Station</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)){ logConsole("row",$row['CityName']);?>
        <!--        <tr><td> --><?php ////echo $row['CityID'] ?><!--</td>-->

        <td> <a href="linksMeasurments.php?StationID=<?php echo $row['StationID'] ?>"> <?php echo $row['StationName'] ?></a></td>

        <td>  <?php echo $row['CityName'] ?> </td>

        <td> <form action="addBookmark.php" >

                <input type="submit" name="<?php echo $row['StationName'] ?>" value="+" />

            </form>
        </td>

        </tr>
    <?php } ?>
</table> <br>




<?php
$countriesQuery = "SELECT * FROM countries";
$countriesList = mysqli_query($con, $countriesQuery);
?>

<form action="linksChangeCountry.php" method="get">
    <table>

        <tr><td>Choose another country</td>
            <td>
                <select name="CountryID" id="CountryID">

                    <option value=""> Select a country </option>
                    <?php while( $countries = mysqli_fetch_assoc($countriesList)) { ?>
                        <option value="<?php echo $countries['CountryID'] ?>"><?php echo $countries['CountryName'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr><td></td>
            <td>
                <button type="submit">Select</button>
            </td>
        </tr>
    </table>
</form>



</body>
</html>