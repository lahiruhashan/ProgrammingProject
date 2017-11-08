<html>



<head>
    <title>Login |German Fitness Center </title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="Jolly Login Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Meta tags -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="<?php echo base_url() ?>css/style.css" rel="stylesheet" type="text/css" media="all">
    <!--//style sheet end here-->

    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">



</head>
<body>

<!---728x90--->
<h1>Login Form</h1>

<?php
if(!empty($success_msg)){
    echo '<p class="statusMsg">'.$success_msg.'</p>';
}elseif(!empty($error_msg)){
    echo '<p class="statusMsg">'.$error_msg.'</p>';
}
?>


<!---728x90--->
<div class="main-w3">
    <?php if ($this->session->flashdata('error')) {?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php  } ?>
    <!-- validation messages for taking inputs -->
    <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>','</div>');
    ?>

    <?php echo form_open('userController/login') ?>
        <h2><span class="fa fa-user t-w3" aria-hidden="true"></span></h2>
        <div class="login-w3ls">
            <div class="icons">

                <input type="email" name="email" placeholder="Email" required="">
                <span class="fa fa-user" aria-hidden="true"></span>
                <div class="clear"></div>
            </div>
            <div class="icons">

                <input type="password" name="password" placeholder="Password" required="">
                <span class="fa fa-key" aria-hidden="true"></span>
                <div class="clear"></div>
            </div>
            <div class="btnn">
<!--                <input type="checkbox" class="checked"><span class="span"><b>Remember me..?</b></span><br>-->
                <button type="submit">Login</button><br>

                <a href="<?php echo site_url('userController/signUp') ?>" class="for"><b>Sign Up</b></a>
<br>
                <br>

                <a href="<?php echo site_url('userController/profile') ?>" class="for"><b>Home</b></a>

<!--                <a href="#" class="for"><b>Forgot password...?</b></a>-->
            </div>
        </div>
        <?php echo form_close() ?>

</div>
<!---728x90--->
<div class="copy">
    <p>©2017 German Fitness Center.
    </p></div>

<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


</body>
<!--</script>-->



</html>