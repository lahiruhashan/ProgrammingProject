$(document).ready(function () {

    $.ajax({
        type: 'post',
        url: 'appointment/getAll',
        dataType: 'json',
        data: {},
        success: function(response) {

            for(i = 0 ; i < response.length;i++){
                var slot = response[i]['slot'];
                var time;
                if(slot == 0){
                    time = "10:00:00";
                }else if(slot == 1){
                    time = "13:00:00";
                }else if(slot == 2){
                    time = "15:00:00";
                }else if(slot == 3){
                    time = "17:00:00";
                }else if(slot == 4){
                    time = "19:00:00";
                }
                var status;
                if(new Date(response[i]['date']+ " " + time) - Date.now() > 0){
                    status = "UPCOMING";
                }else{
                    if(response[i]['attendance'] == 1){
                        status = "PAST";
                    }else if(response[i]['attendance'] == 0){
                        status = "MISSED";
                    }

                }
                $('.table-body').append(
                    '<tr data-status="'+status+'">'+
                        '<td>'+
                        '<div class="media">'+

                        '<div class="media-body">'+
                        '<span class="media-meta pull-right">'+response[i]['date']+'</span>'+
                    '<h4 class="title" style="color:#c0392b">'+
                        'Time Slot : '+time+
                    '<span class="pull-right '+status+'"></span>'+
                        '</h4>'+
                        '<p class="summary">Booked on : '+response[i]['created_at']+'</p>'+
                        '</div>'+
                        '</div>'+
                        '</td>'+
                        '</tr>'
                );
            }
        },
        error: function(response){
            alert("error" + response);
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
