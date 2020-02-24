$(document).ready(function () {

//handle menu collpase and expansion
    $("#menu-toggle").click(function (e) {
        //toggle to collpase or expand
        $("#wrapper").toggleClass("toggled");

        //Get the rotation of the element
        var rotation = getRotationDegrees($(this));

        //if not rotated then rotate 180 degrees
        if (rotation === 0) {
            $(this).css({
                "transform": "rotate(180deg)"
            });
        }
        //if rotated 180 degrees return to 0 degrees
        if (rotation === 180) {
            $(this).css({
                "transform": "rotate(0deg)"
            });
        }
    });

    $(".sortTable").tablesorter({
        theme: "default"
    });

});

function getRotationDegrees(obj) {
    var matrix = obj.css("-webkit-transform") ||
            obj.css("-moz-transform") ||
            obj.css("-ms-transform") ||
            obj.css("-o-transform") ||
            obj.css("transform");
    if (matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
        var angle = Math.round(Math.atan2(b, a) * (180 / Math.PI));
    } else {
        var angle = 0;
    }
    return angle;
}