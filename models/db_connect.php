<?php
include("../../metadata/db_credentials.php");

$currentTable = "main_table";

$connect = mysqli_connect($hostName,$userName,$password,$database);
if (!$connect) {
    die(mysqli_error());
}

//connect to db called team_scheduler
//TODO: change team_scheduler to shift_scheduler
mysqli_select_db($connect,$database);
$myQuery = "SELECT ".$daysOfTheWeekString .
            " FROM ". $currentTable;
$results = mysqli_query($connect,$myQuery) or die($myQuery."<br/><br/>".mysqli_error());
?>

