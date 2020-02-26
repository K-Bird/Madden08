<br>
<table class="table table-sm">
    <thead>
        <tr>
            <th>Year</th><th>Position</th><th>Age</th><th>OVR</th><th>Acquired</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $getPlayerOverview = db_query("SELECT * FROM `franchise_year_roster` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");
        while ($fetchPlyerOverview = $getPlayerOverview->fetch_assoc()) {


            echo '<tr>';
            echo '<td>'. $fetchPlyerOverview['Year'].'</td>';
            echo '<td>'. $fetchPlyerOverview['Position'].'</td>';
            echo '<td>'. $fetchPlyerOverview['Age'].'</td>';
            echo '<td>'. $fetchPlyerOverview['Overall'].'</td>';
            echo '<td>'. $fetchPlyerOverview['Acquired'].'</td>';
            echo '</tr>';
            
        }
        ?>
    </tbody>
</table>