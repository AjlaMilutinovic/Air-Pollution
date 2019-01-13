<!doctype html>
<html>
<head>

</head>
<body>

<?php

    include('database.php');
    include('logger.php');

    //checks for form submission
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $errors = array();

        //Check if there is a admnin
        if(empty($_POST['isAdmin'])){
            $isa = 0;
        }else{
            if(trim($_POST['isAdmin'])==1) $isa = 1;
            else $isa = 0;
//            echo "$un";
        }

        //Check if there is a username
        if(empty($_POST['Username'])){
            $errors[] ='You have not entered your username.';
        }else{
            $un = trim($_POST['Username']);
//            echo "$un";
        }

        //Check if there is a first name
        if(empty($_POST['FirstName'])){
            $errors[] ='You have not entered your first name.';
        }else{
            $fn = trim($_POST['FirstName']);
//            echo "$fn";
        }

        //Check if there is a last name
        if(empty($_POST['LastName'])){
            $errors[] ='You have not entered your last name.';
        }else{
            $ln = trim($_POST['LastName']);
//            echo "$ln";
        }

        //Check if there is an e-mail address
        if(empty($_POST['Email'])){
            $errors[] ='You have not entered your first name.';
        }else{
            $e = trim($_POST['Email']);
//            echo "$e";
        }

        //Checks for a password and if it matched to confirmed password
        if(!empty($_POST['pass1'])){
            if($_POST['pass1'] != $_POST['pass2']){
                $errors[] = 'Your password did not match the confirmed password.';
            } else {
                $p = trim($_POST['pass1']);
//                echo "$p";
            }
        } else
        {
            $errors[] = 'You forgot to enter your password';
        }


        //Check if there is a birthday
        if(empty($_POST['Birthday'])){
            $errors[] ='You have not entered your birthday.';
        }else{
            $bday = $_POST['Birthday'];
        }




        print_r($errors);

        //If everything is error free, then register user to database
        if(empty($errors)){

            require ('database.php');

            //Making the query

            $q = "INSERT INTO userspasswords (`Username`, `Password`, `FirstName`, `LastName`, `Email`, `Birthday`, `isAdmin`, `Regdate`) 
                  VALUES ('$un', SHA('$p'), '$fn', '$ln', '$e', '$bday','$isa', NOW())";

            $r = @mysqli_query($con, $q);

//            logConsole("status", $r);

            //If it ran OK print a message
            if($r) {
                echo "<h1>Thank you!</h1> <p>You are now registered to our site!</p>";
            }else{
                echo "An error occured, you were not registered.";
            }

            mysqli_close($con); //Close the database connection
        }else
        {
            echo "errori, errori";
        }

    }
?>

<h1>Register</h1>
<form action="UserSignUp.php" method="post">
    <p>Username: <input type="text" name="Username" size="15" maxlength="20" value="<?php if(isset($_POST['Username'])) echo $_POST['Username']; ?>" /> </p>
    <p>First name: <input type="text" name="FirstName" size="15" maxlength="20" value="<?php if(isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>" /> </p>
    <p>Last name: <input type="text" name="LastName" size="15" maxlength="20" value="<?php if(isset($_POST['LastName'])) echo $_POST['LastName']; ?>" /> </p>
    <p>Email: <input type="text" name="Email" size="15" maxlength="20" value="<?php if(isset($_POST['Email'])) echo $_POST['Email']; ?>" /> </p>
    <p>Birthday: <input type="date" name="Birthday" size="15" maxlength="20" value="<?php if(isset($_POST['Birthday'])) echo $_POST['Birthday']; ?>" /> </p>
    <p>Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /> </p>
    <p>Confirm password: <input type="password" name="pass2" size="15" maxlength="20" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /> </p>
    <p>Admin code: <input type="number" name="isAdmin" size="15" value="<?php if(isset($_POST['isAdmin'])) echo $_POST['isAdmin']; ?>" /> </p>
    <p><input type="submit" name="submit" value="Register" /></p>
</form>


<button><a href="index.php">Back</a></button>

</body>
</html>