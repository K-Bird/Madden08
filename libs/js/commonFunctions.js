$(document).ready(function () {

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

    //Master Edit Button Function
    $("#toggleEdit").click(function (e) {
        $(".yearEdit").toggle();
    });

    //Grab Preseason Row Data Which is Passed to the Shown Modal
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
});
