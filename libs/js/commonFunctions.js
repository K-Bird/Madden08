$(document).ready(function () {

    //Common functions to remember which panel was last opened on a franchise year
    //Resets after panel is shown so navigation another franchise has no panel remebered until called
    localStorage.setItem('lastPage', localStorage.getItem('currentPage'));
    localStorage.setItem('currentPage', window.location.href);

    if (localStorage.getItem('currentPage') !== localStorage.getItem('lastPage')) {
        localStorage.setItem('lastPanel', null);
    }

    $('#accordion .panel').on('shown.bs.collapse', function (e) {
        localStorage.setItem('lastPanel', $(e.target).attr("id"));
    });

    if (localStorage.getItem('lastPanel') === null) {

    } else {
        var lastPanel = localStorage.getItem('lastPanel');
        $("#" + lastPanel).addClass("in");
        $("#" + lastPanel).parents("div").addClass("in");
    }

    //Common Function to check if user is in editing mode. If yes ('Y') then display the editing elements and set update functions
    if (localStorage.getItem('editing') === 'Y') {
        $(".yearEdit").show();
        $(".resultEdit").show();
        $(".teamStatEdit").show();
        $(".indvStatEdit").show();
        $(".indvStatAdd").show();
        $(".indvStatRemove").show();
        $(".coachChgEdit").show();
        $(".awardRemove").show();
        $(".probowlRemove").show();
        $(".movesRemove").show();

        setEditing();
    }

    //Common Function That Toggles the Sidebar Shown/Hidden for Each Page
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    //Common Function To Enable all Tooltips on Page
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    //Common Functions: History Popovers for Individual Franchise Years

    //Preseason History Popovers
    $(".preHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Coaching Staff History Popovers
    $(".coachHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Player History Popovers
    $(".playerHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Team Stat History Popovers
    $(".teamStatHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Passing Stat History Popovers
    $(".passingHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Rushing Stat History Popovers
    $(".rushingHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Receiving Stat History Popovers
    $(".recHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Blocking Stat History Popovers
    $(".blockingHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Defensive Stat History Popovers
    $(".defHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Offseason Info History Popovers
    $(".offInfoHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Coach Change History Popovers
    $(".coachCHGHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Offseason Awards History Popovers
    $(".awardHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Offseason Pro Bowl History Popovers
    $(".probowlHistory").one('click', function (event) {
        $('#' + event.target.id).popover({
            html: true,
            content: function () {
                return $('#' + event.target.id + 'Table').html();
            }
        });
        $('#' + event.target.id).popover('show');
    });
    //Common Functions: Functions to Edit Franchise Year Pages

    //Master Toggle Editing Functions  
    $("#toggleEdit").click(function (e) {

        //Check state of editing mode when edit button is clicked, set accordingly
        switch (localStorage.getItem('editing')) {
            case null :
                localStorage.setItem('editing', 'Y');
                break;
            case 'Y' :
                localStorage.setItem('editing', 'N');
                break;
            case 'N' :
                localStorage.setItem('editing', 'Y');
                break;
        }

        //Toggle editing elements wit yearEdit class
        $(".yearEdit").toggle();

        //Toggle if results table edit icons are editable/visable
        $(".resultEdit").toggle();

        //Toggle if team stats table edit icons are editable/visable
        $(".teamStatEdit").toggle();

        //Toggle if individual stats table edit icons are editable/visable
        $(".indvStatEdit").toggle();
        $(".indvStatRemove").toggle();
        $(".indvStatAdd").toggle();

        //Toggle if coaching change table edit icons are editable/visable
        $(".coachChgEdit").toggle();

        //Toggle Yearly Award edit elements
        $(".awardRemove").toggle();

        //Toggle Probowl edit elements
        $(".probowlRemove").toggle();

        //Toggle Retired, Draft, Pre&Post Free Agency edit elements
        $(".movesRemove").toggle();

        setEditing();

    });

    //Grab Team Info Row Data Which is Passed to the Shown Modal (Preseason/Postseason Info)
    $(".yearEditBtn").click(function (e) {
        var table = $(this).data('table');
        var row = $(this).data('row');
        var col = $(this).data('col');
        $(".editModal #table").val(table);
        $(".editModal #row").val(row);
        $(".editModal #col").val(col);
    });

    //For Any editModal Shown Focus on the Value Input Field
    $(".editModal").on('shown.bs.modal', function (e) {
        $('[id$=Value]').focus();
    });
    //When a Dropdown Item is Selected Replace Button Text With Selected Item
    $(".dropdown-menu li a").click(function () {
        var selText = $(this).text();
        $(this).parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
    });

    //Common function to submit year edit forms via AJAX
    $(".yearForm").submit(function (e)
    {
        window.getIDfromName = $(this).attr('name');
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    success: function (data, textStatus, jqXHR)
                    {
                        $(".modal").modal('hide');
                        $("#" + getIDfromName).text(data);

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert("Form did not process");
                    }
                });
        e.preventDefault();
    });

    //Common function to submit depth chart changes
    $(".editDepthForm").submit(function (e)
    {
        $depthFormData = $('.editDepthForm').serialize();
        $.ajax(
                {
                    url: "../../_update/Edit_Depth_Chart.php",
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

    //Common function to submit remove player forms
    $(".removePlayerForm").submit(function (e)
    {
        $removePlayerData = $(this).serialize();
        $.ajax(
                {
                    url: "../../_update/Remove_Player.php",
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

    //Common function to submit add player forms
    $(".addPlayerForm").submit(function (e)
    {
        $addPlayerData = $(this).serialize();
        $.ajax(
                {
                    url: "../../_update/Add_Player.php",
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

    //Common functions to edit onclick edit functionality for results table cells
    function toggleAttr(el, attribute, vals) {
        if ($(el).attr(attribute) === vals[0]) {
            $(el).attr(attribute, vals[1]);
        } else if ($(el).attr(attribute) === vals[1])

        {
            $(el).attr(attribute, vals[0]);
        }
    }

    //Common function to submit add passer row to individual stats
    $(".addPassForm").submit(function (e)
    {
        $addPassData = $(this).serialize();
        $.ajax(
                {
                    url: "../../_update/Add_Stat_Pass.php",
                    type: "POST",
                    data: $addPassData,
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

    //Common function to submit add passer row to individual stats
    $(".addRushForm").submit(function (e)
    {
        $addRushData = $(this).serialize();
        $.ajax(
                {
                    url: "../../_update/Add_Stat_Rush.php",
                    type: "POST",
                    data: $addRushData,
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

    //Common function to submit add passer row to individual stats
    $(".addRecForm").submit(function (e)
    {
        $addRecData = $(this).serialize();
        $.ajax(
                {
                    url: "../../_update/Add_Stat_Rec.php",
                    type: "POST",
                    data: $addRecData,
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

    //Common function to submit add blocker row to individual stats
    $(".addBlockForm").submit(function (e)
    {
        $addBlockData = $(this).serialize();
        $.ajax(
                {
                    url: "../../_update/Add_Stat_Block.php",
                    type: "POST",
                    data: $addBlockData,
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

    //Common function to submit add blocker row to individual stats
    $(".addDefForm").submit(function (e)
    {
        $addDefData = $(this).serialize();
        $.ajax(
                {
                    url: "../../_update/Add_Stat_Def.php",
                    type: "POST",
                    data: $addDefData,
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

    //Common function to submit add blocker row to individual stats
    $(".addSTForm").submit(function (e)
    {
        $('.addSTForm').find(':input:disabled').removeAttr('disabled');
        $addSTData = $(this).serialize();
        $.ajax(
                {
                    url: "../../_update/Add_Stat_ST.php",
                    type: "POST",
                    data: $addSTData,
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

    //Common Function to change enable field on add Offseason move modal
    $("#moveType").change(function () {
        if ($(this).val() === 'draft') {
            $('.draftMove').prop('disabled', false);
        } else {
            $('.draftMove').prop('disabled', true);
        }
    });

    //
    $(".movesAdd").click(function (e) {
        var type = $(this).data('movetype');
        $("#addMoves #moveType").val(type);

        if (type === 'draft') {
            $('.draftMove').prop('disabled', false);
        }
    });

    //Common functions to sort tables
    $("#passingStatsTable").stupidtable(); //Indv Passing Stats
    $("#rushingStatsTable").stupidtable(); //Indv Rushing Stats
    $("#recStatsTable").stupidtable(); //Indv Rec Stats
    $("#blockingStatsTable").stupidtable(); //Indv Block Stats
    $("#defStatsTable").stupidtable(); //Indv Defensive Stats

});

//Common function to update regular season table
function updateReg(e) {

    var id = e.id;
    var split = id.split("/");
    var row = split[0];
    var fran = split[1];
    var year = split[2];
    var col = split[3];

    var newVal = prompt("Enter New Value: ");
    if (newVal === null) {
        return;
    }

    $.ajax(
            {
                url: "../../_update/Update_Results.php",
                type: "POST",
                data: {
                    row: row,
                    fran: fran,
                    year: year,
                    col: col,
                    newVal: newVal
                },
                success: function (data, textStatus, jqXHR)
                {
                    $(e).parent().text(data);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert("Update Did Not Complete");
                }
            });
}

//Common function to update team stats table
function updateTeamStat(e) {

    var id = e.id;
    var split = id.split("/");
    var row = split[0];
    var fran = split[1];
    var year = split[2];
    var col = split[3];

    var newVal = prompt("Enter New Value: ");
    if (newVal === null) {
        return;
    }

    $.ajax(
            {
                url: "../../_update/Update_TeamStat.php",
                type: "POST",
                data: {
                    row: row,
                    fran: fran,
                    year: year,
                    col: col,
                    newVal: newVal
                },
                success: function (data, textStatus, jqXHR)
                {
                    $(e).parent().text(data);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert("Update Did Not Complete");
                }
            });
}

//Common function to update team stats table
function updateIndvStat(e) {

    var id = e.id;
    var split = id.split("/");
    var row = split[0];
    var fran = split[1];
    var year = split[2];
    var col = split[3];
    var table = split[4];

    var newVal = prompt("Enter New Value: ");
    if (newVal === null) {
        return;
    }

    $.ajax(
            {
                url: "../../_update/Update_IndvStat.php",
                type: "POST",
                data: {
                    row: row,
                    fran: fran,
                    year: year,
                    col: col,
                    newVal: newVal,
                    table: table
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

//Common function to remove individual stat row
function removeIndvStat(e) {

    var id = e.id;
    var split = id.split("/");
    var row = split[0];
    var table = split[1];
    var fran = split[2];

    $.ajax(
            {
                url: "../../_update/Remove_Indv_Stat.php",
                type: "POST",
                data: {
                    row: row,
                    table: table,
                    fran: fran
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
    var fran = split[1];
    var year = split[2];
    var col = split[3];

    var newVal = prompt("Enter New Value: ");
    if (newVal === null) {
        return;
    }

    $.ajax(
            {
                url: "../../_update/Update_Off_CoachChg.php",
                type: "POST",
                data: {
                    row: row,
                    fran: fran,
                    year: year,
                    col: col,
                    newVal: newVal,
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
    var split = id.split("/");
    var row = split[0];
    var table = split[1];
    var fran = split[2];

    $.ajax(
            {
                url: "../../_update/Remove_Off_Award.php",
                type: "POST",
                data: {
                    row: row,
                    table: table,
                    fran: fran
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
    var split = id.split("/");
    var row = split[0];
    var table = split[1];
    var fran = split[2];

    $.ajax(
            {
                url: "../../_update/Remove_Off_Probowl.php",
                type: "POST",
                data: {
                    row: row,
                    table: table,
                    fran: fran
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
    var split = id.split("/");
    var row = split[0];
    var table = split[1];
    var fran = split[2];

    $.ajax(
            {
                url: "../../_update/Remove_Off_Move.php",
                type: "POST",
                data: {
                    row: row,
                    table: table,
                    fran: fran
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

function setEditing() {

    if (localStorage.getItem('editing') === 'Y') {
        $(".resultEdit").attr('onclick', 'updateReg(this)');
        $(".teamStatEdit").attr('onclick', 'updateTeamStat(this)');
        $(".indvStatEdit").attr('onclick', 'updateIndvStat(this)');
        $(".coachChgEdit").attr('onclick', 'updateCoachChg(this)');
    }
    if (localStorage.getItem('editing') === 'N') {
        $(".resultEdit").attr('onclick', '');
        $(".teamStatEdit").attr('onclick', '');
        $(".indvStatEdit").attr('onclick', '');
        $(".coachChgEdit").attr('onclick', '');
    }
}