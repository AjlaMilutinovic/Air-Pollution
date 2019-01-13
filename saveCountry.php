<?php

    include('database.php');

    session_start();

    $countryName = mysqli_real_escape_string($con, $_POST['CountryName']);
    $countryID = mysqli_real_escape_string($con, $_POST['id']);

    mysqli_query($con, "INSERT INTO countries (CountryID, CountryName) values ('$countryID', '$countryName')");

    header('Location: editCountries.php');
