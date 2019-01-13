<?php
session_start();
?>

<!doctype html>
<html>
<head>
    <title>
        Sign in
    </title>
<body>

<form action="authentication.php" method="POST">

    <?php
    if (isset($_SESSION['msg'])) {
        echo '<p style="margin: 0 0 20px">' . $_SESSION['msg'] . '</p>';
        unset($_SESSION['msg']);
    }
    ?>

    <label for="email">Username</label>
    <input type="text" name="Username" id="Username" required><br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required><br>

    <button type="submit">Submit</button>

</form>

</body>
</html>