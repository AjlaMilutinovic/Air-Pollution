<?php

include ('database.php');
include ('logger.php');
//include ('linksChangeCountry.php');
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

<h1>Choose city</h1>

<a href="index.php"><- Homepage</a><br><br>

<?php

//$selected = NULL;

if(isset($_SESSION['CountryID'])){

    $selected = $_SESSION['CountryID'];
}
else
{
    $selected = $_GET['CountryID'];
}

$tonum = (int)$selected;

logConsole("selected", $selected);

$queryultima = "SELECT `cit`.`CityID`, `cit`.`CityName`, `c`.`CountryName` from cities cit, countries c where cit.CountryFK=c.CountryID and c.CountryID='$tonum'  ORDER BY `cit`.`CityName`";

logConsole("get", $queryultima);

$result = mysqli_query($con, $queryultima);
logConsole("da vidimo", $result);
?>

<table>
    <tr>
        <!--        <th>CityID</th>-->
        <th>City Name</th>
        <th>Country Name</th>
    </tr>

<!--    <form method="POST" action="linksStations.php">-->
        <tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <td>
                <input type="hidden" name=CityName value = <?php $row['CityName'] ?> />

                <?php logConsole('row', $row['CityName']) ?>
<!--                <button type ='submit'> --><?php //echo $row['CityName'] ?><!-- </button>-->
                <a href="linksStations.php?CityID=<?php echo $row['CityID'] ?>"> <?php echo $row['CityName'] ?> </a>
            </td>
            <td> <?php echo $row['CountryName'] ?></td>
            </tr>
    <?php } ?>
<!--    </form>-->
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