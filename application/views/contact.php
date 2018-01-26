<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href='<?php echo base_url() ?>assets/css/contact.css'>
    </head>
    <body>
        <section>
            <div class="container">
                <div class="col-md-4">
                    <img src="<?php echo base_url('assets/images/1.jpg')?>">
                </div>
                <div class="col-md-4">
                    <img src="<?php echo base_url('assets/images/4.jpg')?>">
                </div>
                <div class="col-md-4">
                    <img src="<?php echo base_url('assets/images/3.jpg')?>">
                </div>
                <div class="col-md-12">
                    
                </div>
            </div>
        </section>
<section class="welcome-website">
        <div class="container">
            <div class="row mar-top-30">
                <div class="col-sm-4">
                    <div class="box text-center contact-us-box">
                        <div class="incon-box">
                            <i class="fa fa-map" aria-hidden="true"></i>
                        </div>
                        <h3 class="box-tittle">Our Location </h3>
                        <p class="box-text">24 Kumarathunga Mawath, Matara</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box text-center contact-us-box">
                        <div class="incon-box">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <h3 class="box-tittle">Contact Us Anytime</h3>
                        <p class="box-text">Mobile: 077 2496365 </p>
                        <p class="box-text">Fax: 091 5698365 </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box text-center contact-us-box">
                        <div class="incon-box">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <h3 class="box-tittle">Follow our page</h3>
                        <p class="box-text">Facebook: German Fitness Center</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section class="latest-area-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <div class="section-title">

                        <h2> Leave a <span>Message</span></h2>
                    </div>
                </div>
            </div>
            <div class="row mar-top-30">
                <div class="col-md-6">
                    <div class="panel panel-default panel-box">
                        <div class="panel-body">
                               <?php if ($this->session->flashdata('msg')){
                                 echo "<h3>".$this->session->flashdata('msg')."</h3>";
                               } ?>

                            <?php echo form_open('Contact/addmessage'); ?>
                                <?php echo validation_errors(); ?>

                                <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group contact-form">

                                            <label for="email">Name:</label>
                                            <input type="text" class="form-control" id="email" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group contact-form">

                                            <label for="email">Email address:</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group contact-form">
                                    <label for="comment">Message:</label>
                                    <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default send-btn">Submit</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default panel-box">
                        <div class="panel-body">
                         
            <div id="googleMap" style="width:100%;height:400px;"></div>

      <script>
    function myMap() {
    var mapProp= {
    center:new google.maps.LatLng(5.9500698,80.549739),
    zoom:16,
    };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({
          position: {lat: 5.9500698, lng: 80.549739},
          map: map,
          title: 'Hello World!'});
    }
    
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpZcBPdyjshNZIbGFzzxncnr4DSa667iY&callback=myMap"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
    </html>