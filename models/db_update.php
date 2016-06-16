<?php 

    $jqueryDataVariable = $_POST['stringDataVariable'];
//    echo $jqueryDataVariable;

    $jqueryRowVariable0 = $_POST['stringRowVariable0'];
//    echo $jqueryRowVariable;
    $jqueryColVariable0 = $_POST['stringColVariable0'];

    $jqueryRowVariable = $_POST['stringRowVariable'];
//    echo $jqueryRowVariable;
    $jqueryColVariable = $_POST['stringColVariable'];
//    echo $jqueryColVariable;
//    $jqueryColVariable = (int) $jqueryColVariable;
$queryString = "";

$headers = array("Time","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
    $days = array_map('strtolower', $headers);

//if($jqueryColVariable!=$jqueryColVariable0){
//for($i=0;$i<abs($jqueryColVariable-$jqueryColVariable0);$i++){
//    if($jqueryColVariable>=$jqueryColVariable0)
//        $queryString = $queryString . ", " . $days[$jqueryColVariable0+$i] . " = \"".$jqueryDataVariable."\"";
//    else
//        $queryString = $queryString . ", " . $days[$jqueryColVariable0-$i] . " = \"".$jqueryDataVariable."\"";
//}}
//echo $days[$jqueryColVariable]."egewrg";

    $connect = mysqli_connect("localhost","george","password");
    if (!$connect) {
        die(mysqli_error($connect));
    }

//while(true){
    mysqli_select_db($connect,"team_scheduler");
    $myQuery = "UPDATE main_table
                SET " . $days[$jqueryColVariable0+1] . " = \"".$jqueryDataVariable."\"". $queryString.
                "WHERE id = ".($jqueryRowVariable0+1);
    $results = mysqli_query($connect,$myQuery) or die($myQuery."<br/><br/>".mysqli_error($connect));
//}

//    mysqli_close($connect);
?>