<?php
include('database.php');
include ('logger.php');
session_start();
?>
<!doctype html>
<html>
<head>
    <title>
        Admin Page
    </title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<?php

if(isset($_SESSION['isAdmin'])) :
    if ($_SESSION['isAdmin']==1) :?>

<h4>Admin CRUD</h4>

    <a href="editCountries.php">Countries - CREATE, EDIT, DELETE</a> <br>
    <a href="editCities.php">Cities - CREATE, EDIT, DELETE</a> <br>
    <a href="editStations.php">Stations - CREATE, EDIT, DELETE</a> <br>
    <a href="editMeasurments.php">Measurements - CREATE, EDIT, DELETE</a> <br>
    <a href="editUsers.php">Users - EDIT, DELETE</a> <br>

<?php endif; endif; ?>

<br><br>
<a href="index.php"><- Home page</a>

</body>
</html>