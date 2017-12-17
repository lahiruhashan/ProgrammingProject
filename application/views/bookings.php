<?php
if(!isset($_SESSION['userId'])){
    redirect('signIn');
}
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery-confirm.min.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/calendar.css" >

<div class="container" style="margin-top:50px;">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wrapper">
                        <div id="calendarContainer"></div>
                        <div id="organizerContainer" style="margin-left: 8px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-confirm.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/calendar.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/js/index.js" type="text/javascript"></script>