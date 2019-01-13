<?php

include('database.php');

session_start();

$userID = mysqli_real_escape_string($con, $_POST['UserID']);

$status = mysqli_real_escape_string($con, $_POST['status']);

mysqli_query($con, "UPDATE stations SET isAdmin = '$status' WHERE UserID = " . $userID);

header('Location: editUsers.php');