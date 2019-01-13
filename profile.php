<?php

session_start();

?>

<h1><?php echo $_SESSION['username']?>'s profile</h1>

<?php
    if(isset($_SESSION['isAdmin'])) :
    if ($_SESSION['isAdmin']==1) :?>

    <h3>Admin Edit Page</h3>
    <a href="adminPage.php">Admin Page</a>

    <h3>Bookmarks</h3>

    <?php

        $bookmarkID = $_SESSION['id'];
        $countryQuery = mysqli_query($con, 'SELECT * FROM countries WHERE CountryID = ' . $countryId);
        $countryFields = mysqli_fetch_assoc($countryQuery);

        while($row = mysqli_fetch_assoc($result))

        ?>

<?php endif; endif; ?>