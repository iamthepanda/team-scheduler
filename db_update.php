<?php 

    $jqueryDataVariable = $_POST['stringDataVariable'];
    echo $jqueryDataVariable;

    $jqueryRowVariable = $_POST['stringRowVariable'];
//    echo $jqueryRowVariable;
    $jqueryColVariable = $_POST['stringColVariable'];
//    echo $jqueryColVariable;
    $jqueryColVariable = (int) $jqueryColVariable;
$headers = array("Time","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
    $days = array_map('strtolower', $headers);

//echo $days[$jqueryColVariable]."egewrg";

    $connect = mysqli_connect("localhost","george","password");
    if (!$connect) {
        die(mysqli_error($connect));
    }

//while(true){
    mysqli_select_db($connect,"team_scheduler");
    $myQuery = "UPDATE main_table
                SET " . $days[$jqueryColVariable+1] . " = \"".$jqueryDataVariable."\"
                WHERE id = ".($jqueryRowVariable+1);
    $results = mysqli_query($connect,$myQuery) or die($myQuery."<br/><br/>".mysqli_error($connect));
//}

//    mysqli_close($connect);
?>