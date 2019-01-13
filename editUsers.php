<?php
include ('database.php');
include ('logger.php');
//session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Users Edit Mode
    </title>

    <link rel="stylesheet" href="styles.css">
</head>

<body>

<h1>Users - EDIT MODE</h1>

<a href="adminPage.php"><- Admin page</a>

<?php

$query = "SELECT * FROM userspasswords";
$result = mysqli_query($con, $query);

?>
<br><br>
<table>
    <tr>
        <th>UserID</th>
        <th>Username</th>
        <th>Password</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Birthday</th>
        <th>Registration Date</th>
        <th>Status</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td> <a> <?php echo $row['UserID'] ?> </a> </td>

            <td> <?php echo $row['Username'] ?> </td>

            <td> <?php echo $row['Password'] ?> </td>

            <td> <?php echo $row['FirstName'] ?> </td>

            <td> <?php echo $row['LastName'] ?> </td>

            <td> <?php echo $row['Email'] ?> </td>

            <td> <?php echo $row['Birthday'] ?> </td>

            <td> <?php echo $row['Regdate'] ?> </td>

            <td> <?php if($row['isAdmin']==1) echo "admin"; else echo "user" ?> </td>

            <td>
                <a href="editUser.php?id=<?php echo $row['UserID'] ?>">Edit</a>
            </td>

            <td>
                <a href="deleteUser.php?id=<?php echo $row['UserID'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>


</body>
</html>