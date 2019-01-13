<?php
include('database.php');
?>

<!doctype html>
<html>
<head>
    <title>
        Edit Country
    </title>
</head>
<body>

    <?php

    $countryId = $_GET['id'];
    $countryQuery = mysqli_query($con, 'SELECT * FROM countries WHERE CountryID = ' . $countryId);
    $countryFields = mysqli_fetch_assoc($countryQuery);

    ?>

    <form method="post" action="updateCountry.php?id=<?php echo $countryId; ?>">
        <input type="hidden" name="CountryID" value="<?php echo $countryId ?>">
        <label for="ime">Edit country name: </label>
        <input type="text" name="CountryName" id="ime" required value="<?php echo $countryFields['CountryName'] ?>">
        <button type="submit">Submit</button>
    </form>


</body>
</html>