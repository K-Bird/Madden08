<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

if (isset($_POST['playerOverall'])) {
    $Overall_Change = $_POST['playerOverall'];
}
if (isset($_POST['playerSPD'])) {
    $SPD_Change = $_POST['playerSPD'];
}
if (isset($_POST['playerSTR'])) {
    $STR_Change = $_POST['playerSTR'];
}
if (isset($_POST['playerAWR'])) {
    $AWR_Change = $_POST['playerAWR'];
}
if (isset($_POST['playerAGI'])) {
    $AGI_Change = $_POST['playerAGI'];
}
if (isset($_POST['playerACC'])) {
    $ACC_Change = $_POST['playerACC'];
}
if (isset($_POST['playerCTH'])) {
    $CTH_Change = $_POST['playerCTH'];
}
if (isset($_POST['playerCAR'])) {
    $CAR_Change = $_POST['playerCAR'];
}
if (isset($_POST['playerJMP'])) {
    $JMP_Change = $_POST['playerJMP'];
}
if (isset($_POST['playerBTK'])) {
    $BTK_Change = $_POST['playerBTK'];
}
if (isset($_POST['playerTAK'])) {
    $TAK_Change = $_POST['playerTAK'];
}
if (isset($_POST['playerTHP'])) {
    $THP_Change = $_POST['playerTHP'];
}
if (isset($_POST['playerTHA'])) {
    $THA_Change = $_POST['playerTHA'];
}
if (isset($_POST['playerPBK'])) {
    $PBK_Change = $_POST['playerPBK'];
}
if (isset($_POST['playerRBK'])) {
    $RBK_Change = $_POST['playerRBK'];
}
if (isset($_POST['playerSTA'])) {
    $STA_Change = $_POST['playerSTA'];
}
if (isset($_POST['playerINJ'])) {
    $INJ_Change = $_POST['playerINJ'];
}
if (isset($_POST['playerKR'])) {
    $KR_Change = $_POST['playerKR'];
}
if (isset($_POST['playerIMP'])) {
    $IMP_Change = $_POST['playerIMP'];
}
if (isset($_POST['playerTGH'])) {
    $TGH_Change = $_POST['playerTGH'];
}
if (isset($_POST['playerKPW'])) {
    $KPW_Change = $_POST['playerKPW'];
}
if (isset($_POST['playerKAC'])) {
    $KAC_Change = $_POST['playerKAC'];
}
$Player_Row = $_POST['row'];

foreach ($Overall_Change as $index => $value) {
    if ($Overall_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET Overall='{$Overall_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($SPD_Change as $index => $value) {
    if ($SPD_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET SPD='{$SPD_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($STR_Change as $index => $value) {
    if ($STR_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET STR='{$STR_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($AWR_Change as $index => $value) {
    if ($AWR_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET AWR='{$AWR_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($AGI_Change as $index => $value) {
    if ($AGI_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET AGI='{$AGI_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($ACC_Change as $index => $value) {
    if ($ACC_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET ACC='{$ACC_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($CTH_Change as $index => $value) {
    if ($CTH_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET CTH='{$CTH_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($CAR_Change as $index => $value) {
    if ($CAR_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET CAR='{$CAR_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($JMP_Change as $index => $value) {
    if ($JMP_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET JMP='{$JMP_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($BTK_Change as $index => $value) {
    if ($BTK_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET BTK='{$BTK_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($TAK_Change as $index => $value) {
    if ($TAK_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET TAK='{$TAK_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($THP_Change as $index => $value) {
    if ($THP_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET THP='{$THP_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($THA_Change as $index => $value) {
    if ($THA_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET THA='{$THA_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($PBK_Change as $index => $value) {
    if ($PBK_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET PBK='{$PBK_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($RBK_Change as $index => $value) {
    if ($RBK_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET RBK='{$RBK_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($KPW_Change as $index => $value) {
    if ($KPW_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET KPW='{$KPW_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($KAC_Change as $index => $value) {
    if ($KAC_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET KAC='{$KAC_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($STA_Change as $index => $value) {
    if ($STA_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET STA='{$STA_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($INJ_Change as $index => $value) {
    if ($INJ_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET INJ='{$INJ_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($KR_Change as $index => $value) {
    if ($KR_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET KR='{$KR_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($IMP_Change as $index => $value) {
    if ($IMP_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET IMP='{$IMP_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}

foreach ($TGH_Change as $index => $value) {
    if ($TGH_Change[$index] === '') {
        
    } else {
        db_query("Update `franchise_year_roster` SET TGH='{$TGH_Change[$index]}' WHERE Row_ID='{$Player_Row[$index]}'");
    }
}