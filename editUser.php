<?php
include('database.php');
?>

<!doctype html>
<html>
<head>
    <title>
        Edit User
    </title>
</head>
<body>

<?php

$userId = $_GET['id'];
$userQuery = mysqli_query($con, "SELECT * FROM userspasswords WHERE UserID =" . $userId);
$userFields = mysqli_fetch_assoc($userQuery);

?>

<form method="post" action="updateUser.php?id=<?php echo $userId; ?>">
    <input type="hidden" name="UserID" value="<?php echo $userId ?>">
    <label for="ime">Edit admin status: </label>
    <input type="text" name="status" id="status" required value="<?php echo $userFields['isAdmin'] ?>">
    <button type="submit">Submit</button>
</form>


</body>
</html>