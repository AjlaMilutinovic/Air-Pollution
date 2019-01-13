<?php
include('database.php');
include ('logger.php');

session_start();

$user = mysqli_real_escape_string($con, $_POST['Username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$query = mysqli_query($con, "SELECT * FROM userspasswords WHERE Username = '$user' AND Password = SHA('$password')");

if (mysqli_num_rows($query) == 0) {
    exit('Incorrect username and/or password');
}

$row = mysqli_fetch_assoc($query);

if($row['isAdmin']==1){
$_SESSION['isAdmin']=1;
}
else $_SESSION['isAdmin']=0;

$_SESSION['authentication'] = true;
$_SESSION['name'] = $row['FirstName'] . ' ' . $row['LastName'];
$_SESSION['user_id'] = $row['UserID'];
$_SESSION['username'] = $row['Username'];


header('Location: index.php');
