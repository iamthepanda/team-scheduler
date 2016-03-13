<?php
$monthName = date("F", mktime(0, 0, 0, date("m"), 10));
$currentDate = date(" d");
$headers = array("Time","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
$headerLower = array_map('strtolower', $headers);
$daysOfTheWeekString = "";
for($i=0;$i<7;$i++){
    $days[$i] = $headerLower[$i+1];
    $daysOfTheWeekString = $daysOfTheWeekString . $days[$i];
    if($i!=6){
        $daysOfTheWeekString = $daysOfTheWeekString . ", ";
    }
}
$daysAbbr = array_map(function( $headers ){
    return substr( $headers, 0, 3 );
}, $headers);
$monthAbbr = substr($monthName,0,3);

function hours($j){
    return date("g a", strtotime($j.":00"));
}
?>