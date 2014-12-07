$(document).ready(function () {

    //Common Function That Toggles the Sidebar Shown/Hidden for Each Page
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('[data-togle=popover]').popover();

    $("#capHistory").popover({
        html: true,
        content: function () {
            return $('#capHistoryTable').html();
        }
    });
});

