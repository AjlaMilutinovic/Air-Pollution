<?php

include ('database.php');
include ('logger.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Countries
    </title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Countries</h1>

<?php
$query = "SELECT * FROM countries";
$result = mysqli_query($con, $query);
logConsole("da vidimo", $result);
?>

<table>
            <tr>
                <th>CountryID</th>
                <th>Country Name</th>
            </tr>

    <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr><td> <?php echo $row['CountryID'] ?></td>
            <td> <?php echo $row['CountryName'] ?></td>
        </tr>
    <?php } ?>
</table>




</body>
</html>