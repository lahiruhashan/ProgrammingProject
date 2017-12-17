$(document).ready(function () {

$('.list').on('click', 'li', function() {
    var date = current.getFullYear() + "-" + (current.getMonth() + 1) + "-" +  current.getDate();
    var slot = $(this).closest('li').attr('id').split('-')[3];


    if(new Date(date) - Date.now() < 0){
        $.alert({
            title: 'Booking Blocked',
            theme: 'modern',
            content: 'You Can Only Book Future Time Slots',
            type: 'red',
            typeAnimated: true
        });
    }else{
        $.confirm({
            theme: 'modern',
            title: 'Make an Appointment',
            content: 'Your booking will be on ' + date,
            type: 'blue',
            typeAnimated: true,
            buttons: {
                confirm: {
                    theme: 'modern',
                    text: 'Confirm',
                    btnClass: 'btn-success',
                    action: function(){
                        $.ajax({
                            type: 'post',
                            url: 'booking/book',
                            dataType: 'json',
                            data: {'date' : date,'slot':slot },
                            success: function( response ) {
                                $.alert({
                                    theme: 'modern',
                                    title: 'Successfully Booked',
                                    content: 'Your Booking is Successfully Completed',
                                    type: 'blue',
                                    typeAnimated: true
                                });
                                window.location.href = "booking";
                            },
                            error: function(response){
                                $.alert({
                                    theme: 'modern',
                                    title: 'Already Booked',
                                    content: 'You have already booked ',
                                    type: 'red',
                                    typeAnimated: true
                                });
                            }

                        });
                    }
                },
                cancel:{
                    theme: 'modern',
                    text: 'Cancel',
                    btnClass: 'btn-danger',
                    close: function () {
                    }
                }

            }
        });
    }


});
});