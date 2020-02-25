<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$Positions = array();
array_push($Positions, 'QB1', 'QB2', 'HB1', 'HB2', 'HB3', 'FB1', 'FB2', 'WR1', 'WR2', 'WR3', 'WR4', 'TE1', 'TE2', 'LT1', 'LT2', 'LG1', 'LG2', 'C1', 'C2', 'RG1', 'RG2', 'RT1', 'RT2', 'LE1', 'LE2', 'RE1', 'RE2', 'DT1', 'DT2', 'LOLB1', 'LOLB2', 'MLB1', 'MLB2', 'ROLB1', 'ROLB2', 'CB1', 'CB2', 'CB3', 'CB4', 'FS1', 'FS2', 'SS1', 'SS2', 'K1', 'P1', 'KR', 'PR');

$FranchiseList = array();
array_push($FranchiseList, 'ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GB', 'HOU', 'IND', 'JAC', 'KC', 'MIA', 'MIN', 'NO', 'NYG', 'NYJ', 'OAK', 'PHI', 'PIT', 'SD', 'SEA', 'SF', 'STL', 'TB', 'TEN', 'WAS');

$Get_Team_View_Info = db_query("Select * From `franchise_view_controls` WHERE Control='franchise_current_team'");
$View_Team_Row = $Get_Team_View_Info->fetch_assoc();
$Curr_Team = $View_Team_Row['Value'];

$Get_Year_View_Info = db_query("Select * From `franchise_view_controls` WHERE Control='franchise_current_year'");
$View_Year_Row = $Get_Year_View_Info->fetch_assoc();
$View_Year = $View_Year_Row['Value'];

$Get_Year_Depth_View = db_query("Select * From `franchise_view_controls` WHERE Control='franchise_depth_view'");
$Depth_View_Row = $Get_Year_Depth_View->fetch_assoc();
$Depth_View = $Depth_View_Row['Value'];

$Get_Year_Depth_Formation = db_query("Select * From `franchise_view_controls` WHERE Control='franchise_depth_formation'");
$Depth_Formation_Row = $Get_Year_Depth_Formation->fetch_assoc();
$Depth_Formation = $Depth_Formation_Row['Value'];

$Check_Backups_Display_Result = db_query("SELECT `Value` FROM `franchise_view_controls` WHERE Control='franchise_depth_backups'");
$Check_Backups_Display_Value = $Check_Backups_Display_Result->fetch_assoc();
?>
<html>
    <head>
        <title><?php echo $Curr_Team . " - Year: " . $View_Year ?></title>
        <link rel="shortcut icon" href="../libs/images/nfl.png">
        <link href="../libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">       
        <link href="../libs/css/jstree.css" rel="stylesheet" type="text/css"> 
        <link href="../libs/css/open-iconic-bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/viewFranchise.css" rel="stylesheet" type="text/css"> 
        <script src="../libs/js/jquery.js"></script>
        <script src="../libs/js/bootstrap.js"></script>
        <script src="../libs/js/tablesorter.js"></script>
        <script src="../libs/js/tablesorter-widgets.js"></script>
        <script src="../libs/js/jstree.js"></script>
        <script src="../libs/js/inputSpinner.js"></script>
        <script src="../libs/js/common.js"></script>
        <script>
            $(document).ready(function () {

                $('#Fran_Year_Accordion .card').on('shown.bs.collapse', function (e) {
                    localStorage.setItem('Madden08_franViewLastPanel', $(e.target).attr("id"));
                });

                $('.viewPill').click(function (e) {
                    localStorage.setItem('Madden08_franViewLastPill_nav', $(e.target).data('nav'));
                    localStorage.setItem('Madden08_franViewLastPill_div', $(e.target).attr('href'));
                });

                $('.rememberModal').on('shown.bs.modal', function (e) {
                    localStorage.setItem('Madden08_franViewLastModal', e.target.id);
                });

                $('.rememberModal').on('hidden.bs.modal', function (e) {
                    localStorage.setItem('Madden08_franViewLastModal', null);
                });

                if (localStorage.getItem('Madden08_franViewLastPanel') === null) {

                } else {
                    var lastPanel = localStorage.getItem('Madden08_franViewLastPanel');
                    var lastPill_nav = localStorage.getItem('Madden08_franViewLastPill_nav');
                    var lastPill_div = localStorage.getItem('Madden08_franViewLastPill_div');
                    var lastModal = localStorage.getItem('Madden08_franViewLastModal');
                    $("#" + lastPanel).addClass("show");
                    $("#" + lastPanel).parents("div").addClass("show");
                    $("#" + lastPill_nav).children().addClass("active");
                    $(lastPill_div).addClass("active");
                    $("#" + lastModal).modal('show');
                }


                //When a franchise is selected on the view franchise navigation updated the view table control
                $('.nav_view_franchise').click(function (e) {
                    $franchise_abbrev = e.target.id;
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/controls/update_franchise_team_view.php",
                                type: "POST",
                                data: {franchise_abbrev: $franchise_abbrev},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //When a franchise year is selected on the view franchise navigation updated the view table control
                $('.nav_view_franchise_year').click(function (e) {
                    $selected_year = e.target.id;
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/controls/update_franchise_year_view.php",
                                type: "POST",
                                data: {selected_year: $selected_year},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //--- Initialize Functions - Run When Page is Loaded ---
                //Run function to set inital editing varible and tag text
                initalizeFranEdit();

                // --- Franchise View Page Editing ---
                //Master Toggle Editing Function for Franchise View  
                $("#franToggleEdit").click(function (e) {
                    switch (localStorage.getItem('Madden08_fran_editing')) {
                        case 'Y' :
                            localStorage.setItem('Madden08_fran_editing', 'N');
                            $('#franToggleEdit').text("Edit Franchise");
                            $('.franViewEdit').hide();
                            $('.franViewDisplay').show();
                            break;
                        case 'N' :
                            localStorage.setItem('Madden08_fran_editing', 'Y');
                            $('#franToggleEdit').text("Stop Editing Franchise");
                            $('.franViewEdit').show();
                            $('.franViewDisplay').hide();
                            break;
                    }
                });

                //--- Franchise View Display

                //Create jstree for Depth Chart Tree View on Any Franchise Year Page and Then Open All Nodes
                $('#jstree').jstree({
                    "types": {
                        "default": {
                            "icon": "glyphicon glyphicon-th-list"
                        }
                    },
                    "plugins": ["types"]
                });

                $('#jstree').jstree("open_all");

                //--- Franchise View History ---
                //Display Appropriate History Modal
                $(".historyModal").one('click', function (event) {
                    $('#' + event.target.id).popover({
                        html: true,
                        content: function () {
                            return $('#' + event.target.id + 'Table').html();
                        }
                    });
                    $('#' + event.target.id).popover('show');
                });

                //--- Franchise View Updates ---
                //On Input Change for Prestige Number Input Update the DB Value
                $('#preseason_prestige_input').bind('input', function (e) {
                    $franchise = $(this).data('franchise');
                    $year = $(this).data('year');
                    $new_prestige_value = $('#preseason_prestige_input').val();
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/info/update_franchise_prestige.php",
                                type: "POST",
                                data: {franchise: $franchise, year: $year, new_prestige_value: $new_prestige_value},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //On Input Change for Rival Input Update the DB Value
                $('#preseason_rival_btn').click(function (e) {
                    $franchise = $('#preseason_rival_input').data('franchise');
                    $year = $('#preseason_rival_input').data('year');
                    $new_rival_value = $('#preseason_rival_input').val();

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/info/update_franchise_rival.php",
                                type: "POST",
                                data: {franchise: $franchise, year: $year, new_rival_value: $new_rival_value},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //NFL Icons Input Update the DB Value
                $('#preseason_icons_btn').click(function (e) {
                    $franchise = $('#preseason_icons_input').data('franchise');
                    $year = $('#preseason_icons_input').data('year');
                    $new_icons_value = $('#preseason_icons_input').val();

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/info/update_franchise_icons.php",
                                type: "POST",
                                data: {franchise: $franchise, year: $year, new_icons_value: $new_icons_value},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //On Input Change for Salary Cap Input Update the DB Value
                $('#preseason_salaryCap_input').bind('input', function () {
                    var timer;
                    window.clearTimeout(timer);
                    timer = window.setTimeout(function (e) {

                        $franchise = $('#preseason_salaryCap_input').data('franchise');
                        $year = $('#preseason_salaryCap_input').data('year');
                        $new_salaryCap_value = $('#preseason_salaryCap_input').val();
                        $.ajax(
                                {
                                    url: "../libs/ajax/franchise_view/info/update_franchise_salaryCap.php",
                                    type: "POST",
                                    data: {franchise: $franchise, year: $year, new_salaryCap_value: $new_salaryCap_value},
                                    success: function (data, textStatus, jqXHR)
                                    {
                                        location.reload();
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert("Form Did Not Process");
                                    }
                                });
                        e.preventDefault();
                    }, 1000);
                });

                //On Input Change for Team Salary Input Update the DB Value
                $('#preseason_teamSalary_input').bind('input', function () {
                    var timer;
                    window.clearTimeout(timer);
                    timer = window.setTimeout(function (e) {

                        $franchise = $('#preseason_teamSalary_input').data('franchise');
                        $year = $('#preseason_teamSalary_input').data('year');
                        $new_teamSalary_value = $('#preseason_teamSalary_input').val();
                        $.ajax(
                                {
                                    url: "../libs/ajax/franchise_view/info/update_franchise_teamSalary.php",
                                    type: "POST",
                                    data: {franchise: $franchise, year: $year, new_teamSalary_value: $new_teamSalary_value},
                                    success: function (data, textStatus, jqXHR)
                                    {
                                        location.reload();
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert("Form Did Not Process");
                                    }
                                });
                        e.preventDefault();
                    }, 1000);
                });

                //On Input Change for Cap Room Input Update the DB Value
                $('#preseason_capRoom_input').bind('input', function () {
                    var timer;
                    window.clearTimeout(timer);
                    timer = window.setTimeout(function (e) {

                        $franchise = $('#preseason_capRoom_input').data('franchise');
                        $year = $('#preseason_capRoom_input').data('year');
                        $new_capRoom_value = $('#preseason_capRoom_input').val();
                        $.ajax(
                                {
                                    url: "../libs/ajax/franchise_view/info/update_franchise_capRoom.php",
                                    type: "POST",
                                    data: {franchise: $franchise, year: $year, new_capRoom_value: $new_capRoom_value},
                                    success: function (data, textStatus, jqXHR)
                                    {
                                        location.reload();
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert("Form Did Not Process");
                                    }
                                });
                        e.preventDefault();
                    }, 1000);
                });

                //On Input Change for Cap Penalties Input Update the DB Value
                $('#preseason_capPenalties_input').bind('input', function () {
                    var timer;
                    window.clearTimeout(timer);
                    timer = window.setTimeout(function (e) {

                        $franchise = $('#preseason_capPenalties_input').data('franchise');
                        $year = $('#preseason_capPenalties_input').data('year');
                        $new_capPenalties_value = $('#preseason_capPenalties_input').val();
                        $.ajax(
                                {
                                    url: "../libs/ajax/franchise_view/info/update_franchise_capPenalties.php",
                                    type: "POST",
                                    data: {franchise: $franchise, year: $year, new_capPenalties_value: $new_capPenalties_value},
                                    success: function (data, textStatus, jqXHR)
                                    {
                                        location.reload();
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert("Form Did Not Process");
                                    }
                                });
                        e.preventDefault();
                    }, 1000);
                });

                //On Input Change for Depth Chart View Update the DB Value
                $('#preseason_depthView_input').bind('input', function (e) {
                    $new_view_value = $('#preseason_depthView_input').val();
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/controls/update_franchise_depth_view.php",
                                type: "POST",
                                data: {new_view_value: $new_view_value},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process" + errorThrown);
                                }
                            });
                    e.preventDefault();
                });

                //On Input Change for Depth Chart Formation Update the DB Value
                $('#preseason_depthFormation_input').bind('input', function (e) {
                    $new_formation_value = $('#preseason_depthFormation_input').val();
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/controls/update_franchise_depth_formation.php",
                                type: "POST",
                                data: {new_formation_value: $new_formation_value},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //On Input Change for Depth Chart View Backups Update the DB Value
                $('#Preseason_Backups_Input').change(function (e) {
                    if ($(this).is(":checked")) {
                        $display_backups_value = 'Y';
                    } else {
                        $display_backups_value = 'N';
                    }

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/controls/update_franchise_view_backups.php",
                                type: "POST",
                                data: {display_backups_value: $display_backups_value},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process" + errorThrown);
                                }
                            });
                    e.preventDefault();
                });

                //On Player Attribute Form Submit Serialize the Changes and Submit to DB Processing
                $(".playerAtrributeForm").submit(function (e)
                {
                    $attrFormData = $(this).serialize();
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/roster/update_franchise_playerAttribute.php",
                                type: "POST",
                                data: $attrFormData,
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });


                //On Player Training Camp Form Submit Serialize the Changes and Submit to DB Processing
                $(".playerTCForm").submit(function (e)
                {
                    $tcFormData = $(this).serialize();
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/roster/update_franchise_playerTC.php",
                                type: "POST",
                                data: $tcFormData,
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //On Depth Chart Change Form Submit Serialize the Changes and Submit to DB Processing
                $(".editDepthForm").submit(function (e)
                {
                    $depthFormData = $('.editDepthForm').serialize();
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/roster/update_franchise_depthChart.php",
                                type: "POST",
                                data: $depthFormData,
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //On Depth Chart Remove Form Submit Serialize the Changes and Submit to DB Processing
                $(".removeDepthForm").submit(function (e)
                {
                    $removeFormData = $('.removeDepthForm').serialize();
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/roster/update_franchise_depth_remove.php",
                                type: "POST",
                                data: $removeFormData,
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //Process Depth Chart Player Add
                $(".addPlayerForm").submit(function (e)
                {
                    $addPlayerData = $(this).serialize();
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/roster/update_franchise_depth_add.php",
                                type: "POST",
                                data: $addPlayerData,
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //Process Depth Chart Player Add - KR/PR
                $(".addReturnerForm").submit(function (e)
                {
                    $addPlayerData = $(this).serialize();
                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/roster/update_franchise_depth_add_ret.php",
                                type: "POST",
                                data: $addPlayerData,
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //On Training Camp Remove Drill Button Click, Remove Row From DB
                $('.removeDrill').click(function (e) {
                    $row = e.target.id;

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/roster/update_franchise_remove_playerTC.php",
                                type: "POST",
                                data: {row: $row},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //On Input Change for reagular season simulated change the DB value
                $('#regularseason_simulated_input').bind('input', function (e) {
                    $sim_value = $('#regularseason_simulated_input').val();
                    $franchise = $(this).data("franchise");
                    $year = $(this).data("year");

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/controls/update_franchise_simulated.php",
                                type: "POST",
                                data: {sim_value: $sim_value, franchise: $franchise, year: $year},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();
                });

                //Results on Vs/At Click Update the DB Value
                $('.vsatBtn').click(function (e) {
                    $row = $(this).data('row');
                    $new_VsAt_value = $(this).data('value');

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/results/update_franchise_results_VsAt.php",
                                type: "POST",
                                data: {row: $row, value: $new_VsAt_value},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();

                });

                //Results on W/L Click Update the DB Value
                $('.wlBtn').click(function (e) {
                    $row = $(this).data('row');
                    $new_VsAt_value = $(this).data('value');

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/results/update_franchise_results_WL.php",
                                type: "POST",
                                data: {row: $row, value: $new_VsAt_value},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();

                });

                //Results on Divisional/Non Click Update the DB Value
                $('.divBtn').click(function (e) {
                    $row = $(this).data('row');
                    $new_VsAt_value = $(this).data('value');

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/results/update_franchise_results_div.php",
                                type: "POST",
                                data: {row: $row, value: $new_VsAt_value},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();

                });

                //Results on Vs Team Click Update the DB Value
                $('.vsTeamLi').click(function (e) {
                    $row = $(this).data('row');
                    $new_team_value = $(this).data('fran');

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/results/update_franchise_results_VsTeam.php",
                                type: "POST",
                                data: {row: $row, team: $new_team_value},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Form Did Not Process");
                                }
                            });
                    e.preventDefault();

                });

                //Common function to change enabled fields on add Special Teams row modal
                $("#STType").change(function () {
                    if ($(this).val() === 'Kicking') {
                        $('.kickingCategory').prop('disabled', false);
                        $('.retCategory').prop('disabled', true);
                        $('.puntingCategory').prop('disabled', true);
                        $('.longestPlay').prop('placeholder', 'Longest Field Goal');
                    }
                    if ($(this).val() === 'Punting') {
                        $('.kickingCategory').prop('disabled', true);
                        $('.retCategory').prop('disabled', true);
                        $('.puntingCategory').prop('disabled', false);
                        $('.longestPlay').prop('placeholder', 'Longest Punt');
                    }
                    if ($(this).val() === 'KR') {
                        $('.kickingCategory').prop('disabled', true);
                        $('.retCategory').prop('disabled', false);
                        $('.puntingCategory').prop('disabled', true);
                        $('.longestPlay').prop('placeholder', 'Longest Kick Return');
                    }
                    if ($(this).val() === 'PR') {
                        $('.kickingCategory').prop('disabled', true);
                        $('.retCategory').prop('disabled', false);
                        $('.puntingCategory').prop('disabled', true);
                        $('.longestPlay').prop('placeholder', 'Longest Punt Return');
                    }
                });

                //Common Function to change enabled/hidden fields on add Offseason move modal
                $("#moveType").change(function () {
                    if ($(this).val() === 'draft') {
                        $('#freeName').show();
                        $('#selectName').hide();
                        $('#fa-search-badge').hide();
                        $('#importOffFASearch').hide();
                        $('#offFAImportResults').hide();
                        $('.draftMove').prop('disabled', false);
                    }
                    if ($(this).val() === 'retired') {
                        $('#freeName').hide();
                        $('#selectName').show();
                        $('#fa-search-badge').hide();
                        $('#importOffFASearch').hide();
                        $('#offFAImportResults').hide();
                        $('.off-pos').prop('disabled', true);
                        $('.off-ovr').prop('disabled', false);
                        $('.off-age').prop('disabled', false);
                    }
                    if ($(this).val() === 'prefa' || $(this).val() === 'postfa') {
                        $('#freeName').show();
                        $('#selectName').hide();
                        $('#fa-search-badge').show();
                        $('#importOffFASearch').show();
                        $('#offFAImportResults').show();
                        $('#importOffFASearch').attr('data-faType',type);
                        $('.off-pos').prop('disabled', false);
                        $('.off-ovr').prop('disabled', false);
                        $('.off-age').prop('disabled', false);
                    }
                });

                //Change offseason move type to the type based on the button clicked to open the offseason move modal and display/disable appropriate fields
                $(".offMove").click(function (e) {
                    var type = $(this).data('movetype');
                    $("#addMoves #moveType").val(type);

                    if (type === 'draft') {
                        $('#freeName').show();
                        $('#selectName').hide();
                        $('#fa-search-badge').hide();
                        $('#importOffFASearch').hide();
                        $('#fffFAImportResults').hide();
                        $('.draftMove').prop('disabled', false);
                    }
                    if (type === 'retired') {
                        $('#freeName').hide();
                        $('#selectName').show();
                        $('#fa-search-badge').hide();
                        $('#importOffFASearch').hide();
                        $('#offFAImportResults').hide();
                        $('.off-pos').prop('disabled', true);
                        $('.off-ovr').prop('disabled', false);
                        $('.off-age').prop('disabled', false);
                        $('.draftMove').prop('disabled', true);
                    }
                    if (type === 'prefa' || type === 'postfa') {
                        $('#freeName').show();
                        $('#selectName').hide();
                        $('#fa-search-badge').show();
                        $('#importOffFASearch').show();
                        $('#OffFAImportResults').show();
                        $('#importOffFASearch').attr('data-faType',type);
                        $('.off-pos').prop('disabled', false);
                        $('.off-ovr').prop('disabled', false);
                        $('.off-age').prop('disabled', false);
                        $('.draftMove').prop('disabled', true);
                    }
                });

                //On typing into player import searchbox genterate the tag results as buttons
                $(".importPlayerSearch").keyup(function () {

                    var name = $(this).val();
                    var team = $(this).attr('data-currTeam');
                    var year = $(this).attr('data-viewYear');
                    var pos = $(this).attr('data-pos');

                    if (name === '') {
                        $("#" + pos + 'ImportResults').replaceWith('<div id="' + pos + 'ImportResults"></div>');
                    } else {

                        $.ajax(
                                {
                                    url: "../libs/ajax/franchise_view/roster/search_player_import.php",
                                    type: "POST",
                                    data: {name: name, team: team, year: year, pos: pos},
                                    success: function (data, textStatus, jqXHR)
                                    {
                                        $('#' + pos + 'ImportResults').replaceWith(data);
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert("Tags Could Not Be Loaded: " + errorThrown);
                                    }
                                });
                    }
                });

                //On import player tag button click import player to position
                $(document).on("click", '.playerImportListItem', function (event) {

                    var playerRow = $(this).attr('id');
                    var team = $(this).attr('data-currTeam');
                    var year = $(this).attr('data-viewYear');
                    var pos = $(this).attr('data-pos');

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/roster/import_player.php",
                                type: "POST",
                                data: {playerRow: playerRow, team: team, year: year, pos: pos},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Player Not Imported: " + errorThrown);
                                }
                            });

                });

                //On typing into pre draft FA player import searchbox genterate the tag results as buttons
                $("#importOffFASearch").keyup(function () {

                    var name = $(this).val();
                    var team = $(this).attr('data-currTeam');
                    var year = $(this).attr('data-viewYear');
                    var faType = $(this).attr('data-faType');

                    if (name === '') {
                        $("#offFAImportResults").replaceWith('<div id="offFAImportResults"></div>');
                    } else {

                        $.ajax(
                                {
                                    url: "../libs/ajax/franchise_view/off_move/search_off_FA_import.php",
                                    type: "POST",
                                    data: {name: name, team: team, year: year, type : faType},
                                    success: function (data, textStatus, jqXHR)
                                    {
                                        $('#offFAImportResults').replaceWith(data);
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert("Tags Could Not Be Loaded: " + errorThrown);
                                    }
                                });
                    }
                });

                //On import player tag button click import player to position
                $(document).on("click", '.playerOffFAImportListItem', function (event) {

                    var name = $(this).attr('data-playerName');
                    var pos = $(this).attr('data-playerPos');
                    var ovr = $(this).attr('data-playerOvr');
                    var age = $(this).attr('data-playerAge');
                    var moveType = $(this).attr('data-offType');
                    var playerRow = $(this).attr('data-playerRow');
                    var team = $(this).attr('data-moveTeam');
                    var year = $(this).attr('data-moveYear');

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/off_move/add_franchise_offseason_move.php",
                                type: "POST",
                                data: {playerRow: playerRow, fran: team, franYear: year, pos: pos, freePlayer: name, Ovr: ovr, Age: age, moveType: moveType},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Player Not Imported: " + errorThrown);
                                }
                            });

                });

                $(".removeOffMove").click(function (e) {

                    var row = $(this).attr('id');
                    var moveType = $(this).attr('data-moveType');

                    $.ajax(
                            {
                                url: "../libs/ajax/franchise_view/off_move/remove_franchise_offseason_move.php",
                                type: "POST",
                                data: {
                                    row: row, moveType: moveType
                                },
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Update Did Not Complete");
                                }
                            });

                });

            });

            //**** [ Madden - Franchise Year Functions ] ****//
//Check State of Editing Mode When Edit Button in View Franchise Nav is Clicked: Set Local Storage Variable and Tag Text Accordingly
            function initalizeFranEdit() {

                if (localStorage.getItem('Madden08_fran_editing') === null) {
                    localStorage.setItem('Madden08_fran_editing', 'Y');
                    $('#franToggleEdit').text("Stop Editing Franchise");
                    $('.franViewEdit').show();
                    $('.franViewDisplay').hide();
                } else if (localStorage.getItem('Madden08_fran_editing') === 'Y') {
                    $('#franToggleEdit').text("Stop Editing Franchise");
                    $('.franViewEdit').show();
                    $('.franViewDisplay').hide();
                } else if (localStorage.getItem('Madden08_fran_editing') === 'N') {
                    $('#franToggleEdit').text("Edit Franchise");
                    $('.franViewDisplay').show();
                    $('.franViewEdit').hide();
                }
            }

//Common function to remove individual stat row
            function removeIndvStat(e) {

                var id = e.id;
                var split = id.split("/");
                var row = split[0];
                var stat = split[1];

                $.ajax(
                        {
                            url: "../libs/ajax/franchise_view/indvstats/remove_franchise_indv_stat.php",
                            type: "POST",
                            data: {
                                row: row,
                                stat: stat
                            },
                            success: function (data, textStatus, jqXHR)
                            {
                                location.reload();
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert("Removal Unsuccessful");
                            }
                        });
            }

//Common function to update team stats table
            function updateIndvStat(e) {

                var id = e.id;
                var split = id.split("/");
                var row = split[0];
                var field = split[1];
                var table = split[2];

                var newVal = prompt("Enter New Value: ");
                if (newVal === null) {
                    return;
                }

                $.ajax(
                        {
                            url: "../libs/ajax/franchise_view/indvstats/update_franchise_indv_stat.php",
                            type: "POST",
                            data: {
                                row: row,
                                table: table,
                                field: field,
                                newVal: newVal
                            },
                            success: function (data, textStatus, jqXHR)
                            {
                                location.reload();
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert("Update Did Not Complete");
                            }
                        });
            }

//Common function to remove offseason award row
            function removeAward(e) {

                var id = e.id;


                $.ajax(
                        {
                            url: "../libs/ajax/franchise_view/awards/remove_franchise_award.php",
                            type: "POST",
                            data: {
                                row: id

                            },
                            success: function (data, textStatus, jqXHR)
                            {
                                location.reload();
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert("Update Did Not Complete");
                            }
                        });
            }

//Common function to remove offseason probowl row
            function removeProbowl(e) {

                var id = e.id;


                $.ajax(
                        {
                            url: "../libs/ajax/franchise_view/awards/remove_franchise_probowl.php",
                            type: "POST",
                            data: {
                                row: id

                            },
                            success: function (data, textStatus, jqXHR)
                            {
                                location.reload();
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert("Update Did Not Complete");
                            }
                        });
            }

//Common function to update coaching change table
            function updateCoachChg(e) {

                var id = e.id;
                var split = id.split("/");
                var row = split[0];
                var field = split[1];

                var newVal = prompt("Enter New Value: ");
                if (newVal === null) {
                    return;
                }

                $.ajax(
                        {
                            url: "../libs/ajax/franchise_view/off_coach/update_franchise_off_coach.php",
                            type: "POST",
                            data: {
                                row: row,
                                field: field,
                                newVal: newVal
                            },
                            success: function (data, textStatus, jqXHR)
                            {
                                location.reload();
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert("Update Did Not Complete");
                            }
                        });
            }
        </script>
    </head>
    <body>
        <div id="wrapper">
            <?php
            $NavLevel = '2nd';
            include ('../nav/master_nav.php');
            ?>
            <div id="page-content-wrapper" style="text-align : center">
                <div class="container-fluid">
                    <?php include ('../nav/madden_franchise_nav.php'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <br><br><br>
                            <div id="Fran_Year_Accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <a class="collpased badge badge-light" data-toggle="collapse" data-parent="#Fran_Year_Accordion" href="#Fran_Year_Preseason" aria-expanded="true" aria-controls="preseasonPanel">
                                                <img src="../libs/images/franchises/<?= $Curr_Team ?>_Logo.png" height=25 width=40><?php echo " " . strtoupper($Curr_Team) . " - Year: " . $View_Year . " - Preseason"; ?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="Fran_Year_Preseason" class="collapse" aria-labelledby="headingOne" data-parent="#Fran_Year_Accordion">
                                        <div class="card-body">
                                            <div>
                                                <ul class="nav nav-pills">
                                                    <li id="pill_Preseason_Info" class="nav-item"><a data-nav="pill_Preseason_Info" class="viewPill nav-link nav-link" href="#Preseason_Info" role="tab" data-toggle="tab">Franchise Info</a></li>
                                                    <li id="pill_Preseason_CoachingStaff" class="nav-item"><a data-nav="pill_Preseason_CoachingStaff" class="viewPill nav-link nav-link" href="#Preseason_CoachingStaff" role="tab" data-toggle="tab">Coaching Staff</a></li>
                                                    <li id="pill_Preseason_DepthChart" class="nav-item"><a data-nav="pill_Preseason_DepthChart" class="viewPill nav-link nav-link" href="#Preseason_DepthChart" role="tab" data-toggle="tab">Depth Chart</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <!-- Franchise Info Tab -->
                                                    <div role="tabpanel" class="tab-pane" id="Preseason_Info">
                                                        <?php include ('tabs/preseason_tab_info.php'); ?>
                                                    </div>
                                                    <!-- Coaching Staff Tab -->
                                                    <div role="tabpanel" class="tab-pane" id="Preseason_CoachingStaff">
                                                        <?php include ('tabs/preseason_tab_coachingStaff.php'); ?>
                                                    </div>
                                                    <!-- Depth Chart Tab -->
                                                    <div role="tabpanel" class="tab-pane" id="Preseason_DepthChart">
                                                        <?php include ('tabs/preseason_tab_depthCharts.php'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <a class="collapsed badge badge-light" data-toggle="collapse" data-parent="#Fran_Year_Accordion" href="#Fran_Year_RegularSeason" aria-expanded="false" aria-controls="coachingPanel">
                                                <img src="../libs/images/franchises/<?= $Curr_Team ?>_Logo.png" height=25 width=40><?php echo " " . strtoupper($Curr_Team) . " - Year: " . $View_Year . " - Regular Season"; ?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="Fran_Year_RegularSeason" class="collapse" aria-labelledby="headingTwo" data-parent="#Fran_Year_Accordion">
                                        <div class="card-body">
                                            <div>
                                                <ul class="nav nav-pills" role="tablist">
                                                    <li id="pill_RegularSeason_Results" class="nav-item"><a data-nav="pill_RegularSeason_Results" class="viewPill nav-link" href="#RegularSeason_Results" role="tab" data-toggle="tab">Regular Season Results</a></li>
                                                    <li id="pill_RegularSeason_TeamStats" class="nav-item"><a data-nav="pill_RegularSeason_TeamStats" class="viewPill nav-link" href="#RegularSeason_TeamStats" role="tab" data-toggle="tab">Team Stats</a></li>
                                                    <li id="pill_RegularSeason_IndvStats" class="nav-item"><a data-nav="pill_RegularSeason_IndvStats" class="viewPill nav-link" href="#RegularSeason_IndvStats"role="tab" data-toggle="tab">Indvidual Stats</a></li>
                                                    <li id="pill_RegularSeason_Awards" class="nav-item"><a data-nav="pill_RegularSeason_Awards" class="viewPill nav-link" href="#RegularSeason_Awards" role="tab" data-toggle="tab">Awards</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane" id="RegularSeason_Results">
                                                        <?php include ('tabs/regularseason_tab_results.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="RegularSeason_TeamStats">
                                                        <?php include ('tabs/regularseason_tab_teamstats.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="RegularSeason_IndvStats">
                                                        <?php include ('tabs/regularseason_tab_indvstats.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="RegularSeason_Awards">
                                                        <?php include ('tabs/regularseason_tab_awards.php'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <a class="collapsed badge badge-light" data-toggle="collapse" data-parent="#Fran_Year_Accordion" href="#Fran_Year_Postseason" aria-expanded="false" aria-controls="depthPanel">
                                                <img src="../libs/images/franchises/<?= $Curr_Team ?>_Logo.png" height=25 width=40><?php echo " " . strtoupper($Curr_Team) . " - Year: " . $View_Year . " - Postseason"; ?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="Fran_Year_Postseason" class="collapse" aria-labelledby="headingThree" data-parent="#Fran_Year_Accordion">
                                        <div class="card-body">
                                            <?php
                                            $offRetiredCount = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and `Type`='retired'");
                                            $retired = $offRetiredCount->num_rows;

                                            $offprefaCount = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and Type='prefa'");
                                            $preFA = $offprefaCount->num_rows;

                                            $offdraftCount = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and Type='draft' ORDER BY `Row` ASC");
                                            $draft = $offdraftCount->num_rows;

                                            $offpostfaCount = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and Type='postfa'");
                                            $postFA = $offpostfaCount->num_rows;
                                            ?>
                                            <div>
                                                <ul class="nav nav-pills" role="tablist">
                                                    <li id="pill_Offseason_Staffing" class="nav-item"><a data-nav="Offseason_Staffing" class="viewPill nav-link" href="#Offseason_Staffing" role="tab" data-toggle="tab">Staffing</a></li>
                                                    <li id="pill_Offseason_Retired" class="nav-item"><a data-nav="Offseason_Retired" class="viewPill nav-link" href="#Offseason_Retired" role="tab" data-toggle="tab">Retired Players <?php echo '<span class="badge badge-dark">' . $retired . '</span>' ?></a></li>
                                                    <li id="pill_Offseason_RestrictedFA" class="nav-item"><a data-nav="Offseason_RestrictedFA" class="viewPill nav-link" href="#Offseason_PreFA" role="tab" data-toggle="tab">Pre Draft Free Agents <?php echo '<span class="badge badge-dark">' . $preFA . '</span>' ?></a></li>
                                                    <li id="pill_Offseason_Draft" class="nav-item"><a data-nav="Offseason_Draft" class="viewPill nav-link" href="#Offseason_Draft" role="tab" data-toggle="tab">The Draft <?php echo '<span class="badge badge-dark">' . $draft . '</span>' ?></a></li>
                                                    <li id="pill_Offseason_FA" class="nav-item"><a data-nav="Offseason_FA" class="viewPill nav-link" href="#Offseason_PostFA" role="tab" data-toggle="tab">Post Draft Free Agency <?php echo '<span class="badge badge-dark">' . $postFA . '</span>' ?></a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane" id="Offseason_Staffing">
                                                        <?php include ('tabs/postseason_tab_coachingStaff.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="Offseason_Retired">
                                                        <?php include ('tabs/postseason_tab_retired.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="Offseason_PreFA">
                                                        <?php include ('tabs/postseason_tab_prefa.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="Offseason_Draft">
                                                        <?php include ('tabs/postseason_tab_draft.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="Offseason_PostFA">
                                                        <?php include ('tabs/postseason_tab_postfa.php'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include ('modals/modals_franchise_view.php'); ?>
                </body>
                </html>
                <?php

                function return_depth_result_position($Position, $View_Year, $Curr_Team) {

                    $Position_Result = db_query("SELECT * FROM `franchise_year_roster` WHERE Year='{$View_Year}' and Team='{$Curr_Team}' and Position='{$Position}'");
                    $Position_Row = $Position_Result->fetch_assoc();
                    $weapon = '';
                    if ($Position_Row['Weapon'] != "None") {
                        $weapon = '&nbsp;<img src=../libs/images/weapons/' . $Position_Row['Weapon'] . '.gif height=20 width=20>';
                    }
                    return '<span data-toggle="tooltip" data-placement="top" title="' . $Position_Row['Name'] . '">'
                            . '<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detail' . $Position_Row['Position'] . 'Modal" title="' . $Position_Row['Name'] . '">' . $Position . ': ' . $Position_Row['Overall'] . $weapon . '</button></span>';
                }

                function return_depth_result_tree($Positions, $View_Year, $Curr_Team) {

                    foreach ($Positions as $Pos) {

                        $Pos_Result = db_query("SELECT * FROM `franchise_year_roster` WHERE Year='{$View_Year}' and Team='{$Curr_Team}' and Position='{$Pos}' ORDER BY Position ASC");

                        if (mysqli_num_rows($Pos_Result) == 0) {
                            
                        } else {
                            $Pos_Row = $Pos_Result->fetch_assoc();
                            echo '<li data-toggle="modal" data-target="#detail' . $Pos_Row['Position'] . 'Modal">'
                            . '<div class="treeDepthCell" style="width: 65px"><span class="label label-default">' . $Pos_Row['Position'] . '</span></div>'
                            . '<div class="treeDepthCell" style="width: 100px;"><span class="label label-default">Overall: ' . $Pos_Row['Overall'] . '</span></div>'
                            . '<div class="treeDepthCell" style="width: 150px"><span class="label label-default">' . $Pos_Row['Name'] . '</span></div>'
                            . '<div class="treeDepthCell" style="width: 65px"><span class="label label-default">Age: ' . $Pos_Row['Age'] . '</span></div>';

                            if ($Pos === 'KR' || $Pos === 'PR') {
                                
                            } else {

                                echo '<div class="treeDepthCell" style="width: 80px"><span class="label label-default">' . $Pos_Row['Acquired'] . '</span></div>';
                                echo '<div class="treeDepthCell" style="width: 55px"><span class="label label-default">';
                                if ($Pos_Row['Rookie'] === 'R') {
                                    echo 'Rookie';
                                } else {
                                    echo 'Veteran';
                                }
                                echo '</span></div>';
                                echo '<div class="treeDepthCell" style="width: 45px">';
                                if ($Pos_Row['Weapon'] != "None") {
                                    echo '<img src=../libs/images/weapons/', $Pos_Row['Weapon'], '.gif height=20 width=20>';
                                }
                                echo'</div>';
                                echo '<div class="treeDepthCell" style="width: 45px">';
                                if ($Pos_Row['OSU'] === "Y") {
                                    echo '&nbsp;<img src=../libs/images/OSU.png height=20 width=20>';
                                }
                                echo '</div>';
                            }
                            echo '</li>';
                        }
                    }
                }
                