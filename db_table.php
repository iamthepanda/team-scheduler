<?php
    $j = 0;
    $k = 0;
    $headers = array("Time","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
    $days = array_map('strtolower', $headers);
    while($row = mysqli_fetch_array($results)) {
        echo "<tr>";
            echo "<td style=\"height:20px\">" . $j . ":00</td>";
        
            for($i = 0; $i<7; $i++) {
                echo "<td style=\"height:20px\">";
                
            
                echo "<button class=\"editbtn_row". $j. "_col" . $i . "\" title=\"". $days[($i+1)] . " " . $j . ":00\">" . $row[$i] . "</button>";
                
                
                
                echo "</td>";
            }
        echo "</tr>";
        $j++;
    }
?>