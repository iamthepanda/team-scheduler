<table class="table-bordered" border="1">
    <tr id="headers">
        <th style="width: 72px"></th>
        <?php 
        for($i = 0; $i<7; $i++) {
            echo "<th style=\"width: 72px; padding-top:20px\">";
            
            //TODO: fix this so months will update accurately. currently doesn't account for months changing in the middle of the week
            echo "<pre>". $monthAbbr ." ". ($currentDate+$i) ."</pre>";
            echo "<pre>". $daysAbbr[$i+1] ."</pre>";
            echo "</th>";
        }
        ?>
    </tr>
    <?php
    $j = 0;
    while($row = mysqli_fetch_array($results)) {
        echo "<tr>";

            echo "<td id=\"slots\" style=\"text-align:right; padding-right: 5px\">" . hours($j) ."</td>";

            for($i = 0; $i<7; $i++) {
                echo "<td class=\"slot\" style=\"\">";
                echo "<button class=\"editbtn_row". $j. "_col" . $i . "\" title=\"". $headers[($i+1)] . " " . $j . ":00\">" . $row[$i] . "</button>";

                echo "</td>";
            }
        echo "</tr>";
        $j++;
    }
    ?>
</table>