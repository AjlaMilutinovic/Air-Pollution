<?php

    include('database.php');

    session_start();

    $countryID = mysqli_real_escape_string($con, $_POST['CountryID']);

    $countryName = mysqli_real_escape_string($con, $_POST['CountryName']);

    mysqli_query($con, "UPDATE countries SET CountryName = '$countryName' WHERE CountryID = " . $countryID);

    header('Location: editCountries.php');