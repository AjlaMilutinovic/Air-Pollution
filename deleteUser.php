<?php

include('database.php');

$userID = $_GET['id'];

mysqli_query($con, 'DELETE FROM userspasswords WHERE UserID = ' . $userID);

header('Location: editUsers.php');