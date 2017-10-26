<html>
<head>
        <title>Sign Up |German Fitness Center </title>
        <!-- Meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
        <!--stylesheets-->
        <link href="<?php echo base_url() ?>css/style.css" rel="stylesheet" type="text/css" media="all">
        <!--//style sheet end here-->
        <!-- //font-awesome icons -->

        <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

<style>

    .alert h4{margin-top:0;color:inherit}.alert .alert-link{font-weight:700}.alert>p,.alert>ul{margin-bottom:0}.alert>p+p{margin-top:5px}.alert-dismissable,.alert-dismissible{padding-right:35px}.alert-dismissable .close,.alert-dismissible .close{position:relative;top:-2px;right:-21px;color:inherit}.alert-success{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}.alert-success hr{border-top-color:#c9e2b3}.alert-success .alert-link{color:#2b542c}.alert-info{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}.alert-info hr{border-top-color:#a6e1ec}.alert-info .alert-link{color:#245269}.alert-warning{color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc}.alert-warning hr{border-top-color:#f7e1b5}.alert-warning .alert-link{color:#66512c}.alert-danger{color:#a94442;background-color:#f2dede;border-color:#ebccd1}.alert-danger hr{border-top-color:#e4b9c0}.alert-danger .alert-link{color:#843534}@-webkit-keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}

    .close{float:right;font-size:21px;font-weight:700;line-height:1;color:#000;text-shadow:0 1px 0 #fff;filter:alpha(opacity=20);opacity:.2}.close:focus,.close:hover{color:#000;text-decoration:none;cursor:pointer;filter:alpha(opacity=50);opacity:.5}button.close{-webkit-appearance:none;padding:0;cursor:pointer;background:0 0;border:0}.modal-open{overflow:hidden}.modal{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;display:none;overflow:hidden;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out;-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%)}.modal.in .modal-dialog{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0);transform:translate(0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;outline:0;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5)}.modal-backdrop{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1040;background-color:#000}.modal-backdrop.fade{filter:alpha(opacity=0);opacity:0}.modal-backdrop.in{filter:alpha(opacity=50);opacity:.5}.modal-header{padding:15px;border-bottom:1px solid #e5e5e5}.modal-header .close{margin-top:-2px}

</style>




</head>
<body>

<!---728x90--->
<h1>Sign Up Form</h1>



<!---728x90--->
<div class="main-w3">


    <?php echo form_open('userController/signUp') ?>


    <div class="container">
        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php  } ?>


        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>','</div>');
        ?>

    </div>



    <h2><span class="fa fa-user t-w3" aria-hidden="true"></span></h2>
        <div class="container">

            <div class="icons">
                <input type="text" name="username" placeholder="User Name" required="">
                <span class="fa fa-user" aria-hidden="true"></span>
                <div class="clear"></div>
            </div>
        </div>

        <div class="container">
            <div class="icons">
                <input type="email" name="email" placeholder="Email" required="">
                <span class="fa fa-user" aria-hidden="true"></span>
                <div class="clear"></div>
            </div>
        </div>


        <div class="container">
            <div class="icons">
                <input type="password" name="password" placeholder="Password" required="">
                <span class="fa fa-key" aria-hidden="true"></span>
                <div class="clear"></div>
            </div>
        </div>

        <div class="container">
            <div class="icons">
                <input type="password" name="cPassword" placeholder="Confirm Password" required="">
                <span class="fa fa-key" aria-hidden="true"></span>
                <div class="clear"></div>
            </div>
        </div>

            <div class="btnn">

                <button type="submit">Sign Up</button><br>
                <a href="<?php echo site_url('userController/login') ?>" class="for"><b>Sign In</b></a>

            </div>
        </div>
<?php echo form_close() ?>

</div>
<div class="copy">
    <p>©2017 German Fitness Center </p></div>


<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

</body>



</html>