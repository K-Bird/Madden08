$(document).ready(function () {

    //**** [ Madden - Franchise Year Functions ] ****//

    // --- Franchise View Page History and Viewing Changes ---
    //Remember Last Opened Panel in Franchise View
    //Resets After Panel is Shown so Navigation to Another Franchise has no Panel Remebered Until Called
    /*localStorage.setItem('08_lastPage', localStorage.getItem('08_currentPage'));
    localStorage.setItem('08_currentPage', window.location.href);

    if (localStorage.getItem('08_currentPage') !== localStorage.getItem('08_lastPage')) {
        localStorage.setItem('08_lastPanel', null);
        localStorage.setItem('08_lastPill_nav', null);
        localStorage.setItem('08_lastPill_div', null);
        localStorage.setItem('08_lastModal', null);
    } */

    $('#Fran_Year_Accordion .panel').on('shown.bs.collapse', function (e) {
        localStorage.setItem('08_lastPanel', $(e.target).attr("id"));
    });

    $('.viewPill').click(function (e) {
        localStorage.setItem('08_lastPill_nav', $(e.target).data('nav'));
        localStorage.setItem('08_lastPill_div', $(e.target).attr('href'));
    });
    
    $('.rememberModal').on('shown.bs.modal', function (e) {
        localStorage.setItem('08_lastModal', e.target.id);
    });
    
    $('.rememberModal').on('hidden.bs.modal', function (e) {
        localStorage.setItem('08_lastModal', null);
    });

    if (localStorage.getItem('08_lastPanel') === null) {

    } else {
        var lastPanel = localStorage.getItem('08_lastPanel');
        var lastPill_nav = localStorage.getItem('08_lastPill_nav');
        var lastPill_div = localStorage.getItem('08_lastPill_div');
        var lastModal = localStorage.getItem('08_lastModal');
        $("#" + lastPanel).addClass("in");
        $("#" + lastPanel).parents("div").addClass("in");
        $("#" + lastPill_nav).addClass("active");
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
    initalizeToggleFranText();

    // --- Franchise View Page Editing ---
    //Master Toggle Editing Function for Franchise View  
    $("#franToggleEdit").click(function (e) {
        switch (localStorage.getItem('08_fran_editing')) {
            case null :
                localStorage.setItem('08_fran_editing', 'Y');
                $('#franToggleEdit').text("Stop Editing Franchise");
                $('.franViewEdit').show();
                $('.franViewDisplay').hide();
                break;
            case 'Y' :
                localStorage.setItem('08_fran_editing', 'N');
                $('#franToggleEdit').text("Edit Franchise");
                $('.franViewEdit').hide();
                $('.franViewDisplay').show();
                break;
            case 'N' :
                localStorage.setItem('08_fran_editing', 'Y');
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

    //Process Depth Chart Player Remove
    $(".removePlayerForm").submit(function (e)
    {
        $removePlayerData = $(this).serialize();
        $.ajax(
                {
                    url: "../libs/ajax/franchise_view/roster/update_franchise_depth_remove.php",
                    type: "POST",
                    data: $removePlayerData,
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
                    data: {sim_value: $sim_value, franchise : $franchise, year : $year},
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
                    data: { row: $row, value: $new_VsAt_value},
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
                    data: { row: $row, team: $new_team_value},
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
            $('.draftMove').prop('disabled', false);
        } else {
            $('.draftMove').prop('disabled', true);
        }
        if ($(this).val() === 'retired') {
            $('.freeName').addClass("hidden");
            $('.selectName').removeClass("hidden");
            $('.off-pos').prop('disabled', true);
            $('.off-ovr').prop('disabled', false);
            $('.off-age').prop('disabled', false);
        } else {
            $('.freeName').removeClass("hidden");
            $('.selectName').addClass("hidden");
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
            $('.draftMove').prop('disabled', false);
        } else {
            $('.draftMove').prop('disabled', true);
        }
        if (type === 'retired') {
            $('.freeName').addClass("hidden");
            $('.selectName').removeClass("hidden");
            $('.off-pos').prop('disabled', true);
            $('.off-ovr').prop('disabled', false);
            $('.off-age').prop('disabled', false);
        } else {
            $('.freeName').removeClass("hidden");
            $('.selectName').addClass("hidden");
            $('.off-pos').prop('disabled', false);
            $('.off-ovr').prop('disabled', false);
            $('.off-age').prop('disabled', false);
        }
    });

});

//**** [ Madden - Franchise Year Functions ] ****//
//Check State of Editing Mode When Edit Button in View Franchise Nav is Clicked: Set Local Storage Variable and Tag Text Accordingly
function initalizeToggleFranText() {

    switch (localStorage.getItem('08_fran_editing')) {
        case null :
            $('#franToggleEdit').text("Stop Editing Franchise");
            $('.franViewEdit').show();
            $('.franViewDisplay').hide();
            break;
        case 'Y' :
            $('#franToggleEdit').text("Stop Editing Franchise");
            $('.franViewEdit').show();
            $('.franViewDisplay').hide();
            break;
        case 'N' :
            $('#franToggleEdit').text("Edit Franchise");
            $('.franViewEdit').hide();
            $('.franViewDisplay').show();
            break;
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
                     row : row,
                     stat : stat
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
                    table : table,
                    field : field,
                    newVal : newVal
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

//Common function to remove offseason move row
function removeMovesRow(e) {

    var id = e.id;

    $.ajax(
            {
                url: "../libs/ajax/franchise_view/off_move/remove_franchise_offseason_move.php",
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