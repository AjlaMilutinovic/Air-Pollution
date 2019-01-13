<?php
include ('database.php');
include ('logger.php');
//session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Countries Edit Mode
    </title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<h1>Countries - EDIT MODE</h1>
<h5>Warning! Deleting a country may result in losing city, station and measurement data.</h5>

<a href="adminPage.php"><- Admin page</a>

<h3>Add country:</h3>

<form action="saveCountry.php" method="post">
    <table>
        <tr>
            <td>Country ID</td>
            <td><input type='number' name='id'/></td>
        </tr>
        <tr>
            <td>Country name</td>
            <td><input type='text' name='CountryName'/></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit">Submit</button>
            </td>
        </tr>
    </table>
</form><br><br>


<?php
$query = "SELECT * FROM countries";
$result = mysqli_query($con, $query);
logConsole("da vidimo", $result);
?>

<table>
    <tr>
        <th>CountryID</th>
        <th>Country Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
          <td><?php echo $row['CountryID'] ?></td>
<!--          <td> <a href="http://w3schools.sinsixx.com/php/php_post.asp.htm"> --><?php //echo $row['CountryID'] ?><!-- </a> </td>-->

          <td> <?php echo $row['CountryName'] ?> </td>

          <td>
              <a href="editCountry.php?id=<?php echo $row['CountryID'] ?>">Edit</a>
          </td>

          <td>
              <a href="deleteCountry.php?id=<?php echo $row['CountryID'] ?>">Delete</a>
          </td>
      </tr>
    <?php } ?>
</table>


</body>
</html>