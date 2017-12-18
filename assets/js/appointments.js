$(document).ready(function () {

    $.ajax({
        type: 'post',
        url: 'appointment/getAll',
        dataType: 'json',
        data: {},
        success: function( response ) {
            alert(response.length);
        },
        error: function(response){
            alert("error");
        }

    });

    $('.star').on('click', function () {
        $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
        $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
        var $target = $(this).data('target');
        if ($target != 'all') {
            $('.table tr').css('display', 'none');
            $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
        } else {
            $('.table tr').css('display', 'none').fadeIn('slow');
        }
    });

});/**
 * Created by Hashan on 12/17/2017.
 */
