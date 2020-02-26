<?php
echo '<form role="form" name="' . $pos . '_details" class="playerAtrributeForm">
                    <h3>Attributes</h3>
                    <table class="table table-sm" style="text-align: left; font-size: small">
                        <tr><td></td>';
    foreach ($Display_Attributes as $Attr) {
        echo '<td>' . $Attr . '</td>';
    }
    echo '</tr>';
    $i = 0;
    $previousValues = array();

    $attrDisplay_result = db_query("SELECT * FROM `franchise_info` WHERE Franchise='{$Curr_Team}'");
    $attrDisplay_Row = $attrDisplay_result->fetch_assoc();
    $attrDisplay = $attrDisplay_Row['AttrDisplay'];

    $historical_result = db_query("SELECT * FROM `franchise_year_roster` WHERE (Historical_ID='{$position_Historical_ID}') AND (`Year` >= {$attrDisplay}) ORDER BY Year ASC");

    $lowestYear_result = db_query("SELECT * FROM `franchise_year_roster` WHERE (Historical_ID='{$position_Historical_ID}') AND (`Year` >= {$attrDisplay}) ORDER BY Year ASC LIMIT 1");
    $lowestYear_Row = $lowestYear_result->fetch_assoc();
    $lowestYear = $lowestYear_Row['Year'];

    while ($histAttr_Row = $historical_result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>Year ', $histAttr_Row['Year'], ': </td>';
        foreach ($Display_Attributes as $Attr) {
            if ($Attr === 'Age' || $Attr === 'Position') {
                echo '<td>' . $histAttr_Row[$Attr], '</td>';
            } else {
                echo '<td><input class="form-control attributeInput franViewEdit" type="text" name="player', $Attr, '[]" placeholder="', $histAttr_Row[$Attr], '" style="width: 50px">';
                echo '<span class="badge badge-dark franViewDisplay">' . $histAttr_Row[$Attr] . '</span>';
            }
            if ($histAttr_Row['Year'] === $attrDisplay || $histAttr_Row['Year'] === $lowestYear) {
                echo '';
            } else {
                if ($Attr === 'Age' || $Attr === 'Position') {
                    
                } else {
                    $histAttr_Change = $histAttr_Row[$Attr] - $previousValues[$i - count($Display_Attributes)];
                    if ($histAttr_Change > 0) {
                        echo '<span style="color: green" class="franViewDisplay"> (+' . $histAttr_Change . ')</span>';
                    } elseif ($histAttr_Change === 0) {
                        echo '<span style="color: gold" class="franViewDisplay"> (' . $histAttr_Change . ')</span>';
                    } else {
                        echo '<span style="color: red" class="franViewDisplay"> (' . $histAttr_Change . ')</span>';
                    }
                }
            }
            echo '</td>';
            $i++;
            array_push($previousValues, $histAttr_Row[$Attr]);
        }
        echo '</tr>';
        echo '<input type="hidden" name="row[]" value="', $histAttr_Row['Row_ID'], '" />';
    }
    echo '</table>
                <button type="submit" class="btn btn-success franViewEdit">Submit Attribute Changes</button>
                </form>';