/**
 * Created by Hashan on 12/18/2017.
 */
$(document).ready(function () {

    $.ajax({
        type: 'post',
        url: 'membership',
        dataType: 'json',
        success: function (response) {
            if(response == "already"){
                $('#apply_now').text("Requested");
            }
        },
        error: function (response) {
        }
    });

    $('#apply_now').on('click', function() {
        $.ajax({
            type: 'post',
            url: 'membership/getMembership',
            dataType: 'json',
            data: {},
            success: function (response) {
                if(response == "already"){
                    $('#apply_now').text("Requested");
                }else if(response == "success"){
                    $('#apply_now').text("Requested");
                }
            },
            error: function (response) {

            }
        });
    });

    $('.sub_train').on('click', function () {
        $('html, body').animate({
            scrollTop: $('#apply_now').offset().top
        }, 2000);
    });
});