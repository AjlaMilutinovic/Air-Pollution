<?php

include('database.php');


$element = $_POST['measur'];
$beg = new DateTime($_POST['beg']);
$end = new DateTime($_POST['end']);

$begg = $beg->format('Y-m-d');
$endd = $end->format('Y-m-d');

//RADI BEZ STATION, TREBA JOS NAPRAVITI DA RADI ZA STATION

$max = mysqli_query($con, "SELECT MAX($element) FROM measurments WHERE TimeDate >= '$begg' AND  TimeDate <= '$endd'");
$min = mysqli_query($con, "SELECT MIN($element) FROM measurments WHERE TimeDate >= '$begg' AND  TimeDate <= '$endd'");


echo "The maximum value for " . $element . " between " . $beg->format('Y-m-d') . " and " . $end->format('Y-m-d') . " is: ";

while($row = mysqli_fetch_array($max))
{
    print_r($row[0]);
}

echo "<br /> The minimum value for " . $element . " between " . $beg->format('Y-m-d') . " and " . $end->format('Y-m-d') . " is: ";
while($row = mysqli_fetch_array($min))
{
    print_r($row[0]);
}

//header('Location: queries/averageBetweenDate.php');