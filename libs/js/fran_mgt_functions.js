$(document).ready(function () {

      //On Input Change for Franchise Attribute Display Year Updated the DB
    $('.attrDisplayInput').bind('input', function () {
        var timer;
        var input = $(this);
        window.clearTimeout(timer);
        timer = window.setTimeout(function (e) {

            $franchise = input.data('franchise');
            $new_attrDisplay_value = input.val();
            $.ajax(
                    {
                        url: "../libs/ajax/franchise_mgt/update_franchise_attrDisplay.php",
                        type: "POST",
                        data: {franchise: $franchise, new_attrDisplay_value: $new_attrDisplay_value},
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

});