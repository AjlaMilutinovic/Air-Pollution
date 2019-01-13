<?php

include('database.php');


$element = $_POST['measur'];
$beg = new DateTime($_POST['beg']);
$end = new DateTime($_POST['end']);

$begg = $beg->format('Y-m-d');
$endd = $end->format('Y-m-d');

$result = mysqli_query($con, "SELECT AVG($element) FROM measurments WHERE TimeDate >= '$begg' AND  TimeDate <= '$endd'");

echo "The average value for " . $element . " between " . $beg->format('Y-m-d') . " and " . $end->format('Y-m-d') . " is: ";

while($row = mysqli_fetch_array($result))
{
    print_r($row[0]);
}

//header('Location: queries/averageBetweenDate.php');