$(document).ready(function () {

    //**** [ General Functions for Any Page ] ****// 

    //Toggle Left Side Navigation Menu Collapse on Any Page
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    //Initialize All Toolstips on Any Page
    $('[data-toggle="tooltip"]').tooltip();


});