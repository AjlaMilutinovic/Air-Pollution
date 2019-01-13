<?php
include('database.php');
?>
<!doctype html>
<html>
<head>
    <title>
        Login
    </title>
<!--    <link rel="stylesheet" href="styles.css">-->
</head>
<body>

<main>
    <form method="post" action="authentication.php">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Sign in</button>
    </form>
</main>

</body>
</html>