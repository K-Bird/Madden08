$(document).ready(function () {

    //Common Function That Toggles the Sidebar Shown/Hidden for Each Page
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    //Common Functions: History Popovers for Individual Franchise Years
    $('[data-togle=popover]').popover();

    $("#capHistory").popover({
        html: true,
        content: function () {
            return $('#capHistoryTable').html();
        }
    });
    
     $("#roomHistory").popover({
        html: true,
        content: function () {
            return $('#roomHistoryTable').html();
        }
    });
    
    $("#penHistory").popover({
        html: true,
        content: function () {
            return $('#penHistoryTable').html();
        }
    });
    
    $("#salaryHistory").popover({
        html: true,
        content: function () {
            return $('#salaryHistoryTable').html();
        }
    });
    
    $("#iconsHistory").popover({
        html: true,
        content: function () {
            return $('#iconsHistoryTable').html();
        }
    });
    
        $("#rivalsHistory").popover({
        html: true,
        content: function () {
            return $('#rivalsHistoryTable').html();
        }
    });
});

