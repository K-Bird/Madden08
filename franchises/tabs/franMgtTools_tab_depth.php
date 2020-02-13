<br><br>
<?php
for ($i = 1; $i <= $num_years; $i++) {
    echo '<table class="table small">';
    echo '<tr><td>Depth Chart Year ', $i, '</td></tr>';
    echo '<tr>
                            <td>Offense</td>';
    echo checkFranPositionExists($fran, $i, 'QB1');
    echo checkFranPositionExists($fran, $i, 'QB2');
    echo checkFranPositionExists($fran, $i, 'HB1');
    echo checkFranPositionExists($fran, $i, 'HB2');
    echo checkFranPositionExists($fran, $i, 'HB3');
    echo checkFranPositionExists($fran, $i, 'FB1');
    echo checkFranPositionExists($fran, $i, 'WR1');
    echo checkFranPositionExists($fran, $i, 'WR2');
    echo checkFranPositionExists($fran, $i, 'WR3');
    echo checkFranPositionExists($fran, $i, 'WR4');
    echo checkFranPositionExists($fran, $i, 'TE1');
    echo checkFranPositionExists($fran, $i, 'TE2');
    echo checkFranPositionExists($fran, $i, 'LT1');
    echo checkFranPositionExists($fran, $i, 'LT2');
    echo checkFranPositionExists($fran, $i, 'LG1');
    echo checkFranPositionExists($fran, $i, 'LG2');
    echo checkFranPositionExists($fran, $i, 'C1');
    echo checkFranPositionExists($fran, $i, 'C2');
    echo checkFranPositionExists($fran, $i, 'RG1');
    echo checkFranPositionExists($fran, $i, 'RG2');
    echo checkFranPositionExists($fran, $i, 'RT1');
    echo checkFranPositionExists($fran, $i, 'RT2');
    echo '</tr>';
    echo'<tr>';
    echo '<td>Defense</td>';
    echo checkFranPositionExists($fran, $i, 'LE1');
    echo checkFranPositionExists($fran, $i, 'LE2');
    echo checkFranPositionExists($fran, $i, 'RE1');
    echo checkFranPositionExists($fran, $i, 'RE2');
    echo checkFranPositionExists($fran, $i, 'DT1');
    echo checkFranPositionExists($fran, $i, 'DT2');
    echo checkFranPositionExists($fran, $i, 'LOLB1');
    echo checkFranPositionExists($fran, $i, 'LOLB2');
    echo checkFranPositionExists($fran, $i, 'MLB1');
    echo checkFranPositionExists($fran, $i, 'MLB2');
    echo checkFranPositionExists($fran, $i, 'ROLB1');
    echo checkFranPositionExists($fran, $i, 'ROLB2');
    echo checkFranPositionExists($fran, $i, 'CB1');
    echo checkFranPositionExists($fran, $i, 'CB2');
    echo checkFranPositionExists($fran, $i, 'CB3');
    echo checkFranPositionExists($fran, $i, 'CB4');
    echo checkFranPositionExists($fran, $i, 'FS1');
    echo checkFranPositionExists($fran, $i, 'FS2');
    echo checkFranPositionExists($fran, $i, 'SS1');
    echo checkFranPositionExists($fran, $i, 'SS2');
    echo '</tr>';
    echo '<tr>';
    echo '<td>Special Teams</td>';
    echo checkFranPositionExists($fran, $i, 'K1');
    echo checkFranPositionExists($fran, $i, 'P1');
    echo checkFranPositionExists($fran, $i, 'KR');
    echo checkFranPositionExists($fran, $i, 'PR');
    echo '</tr>';
    echo '</table>';
}
?>