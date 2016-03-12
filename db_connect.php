<?php
    $connect = mysqli_connect("localhost","george","password");
    if (!$connect) {
        die(mysqli_error());
    }
    mysqli_select_db($connect,"team_scheduler");
    $myQuery = "SELECT
                sunday, monday, tuesday, wednesday, thursday, friday, saturday
                FROM main_table";
    $results = mysqli_query($connect,$myQuery) or die($myQuery."<br/><br/>".mysqli_error());

?>

