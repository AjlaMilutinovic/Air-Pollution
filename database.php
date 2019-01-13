<?php

// used to connect to the database

$host = "localhost";
$db_name = "air_pollution";
$username = "root";
$password = "";

//DEFINE('host', 'localhost');
//DEFINE('db_name', 'air_pollution');
//DEFINE('username', 'root');
//DEFINE('password', "");

//$con = mysqli_connect($host, $username, $password, $db_name);

//$con = @mysqli_connect(host, username, password, db_name) OR die('Could not connect to MySQL: ' . mysqli_connect_error());

$con = mysqli_connect($host, $username, $password, $db_name);