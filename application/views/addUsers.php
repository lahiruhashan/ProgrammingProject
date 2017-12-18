<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>app/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>/app/css/index.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet'
          type='text/css'>
    <link href="http://localhost/ci_image_upload_download/css/style.css" rel="stylesheet" type="text/css">


    <style>
        /*.btn-file {*/
        /*position: relative;*/
        /*overflow: hidden;*/
        /*}*/
        /*.btn-file input[type=file] {*/
        /*position: absolute;*/
        /*top: 0;*/
        /*right: 0;*/
        /*font-size: 100px;*/
        /*text-align: right;*/
        /*filter: alpha(opacity=0);*/
        /*opacity: 0;*/
        /*outline: none;*/
        /*background: white;*/
        /*cursor: inherit;*/
        /*display: block;*/
        /*}*/

        /*#img-upload{*/
        /*width: 20%;*/
        /*height: 20%;*/
        /*}*/

        img {
            max-width: 210px;
            max-height: 180px;

        }

        input[type=file] {
            padding: 10px;
        }
    </style>
</head>
<body>
    <!-- /#page-content-wrapper -->
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-money"></i> Add User</div>
            <div class="panel-body">
                <?php echo form_open('customerController/addUser'); ?>
                <br>

                <div class="container">


                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } ?>

                    <!-- validation messages for taking inputs -->
                    <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>', '</div>');
                    ?>


                    <div class="container">


                        <input type='file' onchange="readURL(this);" name="file_name"/>
                        <img id="blah" src="http://placehold.it/180" alt="your image"/>


                    </div>
                    <!--                    <br>-->
                    <br>

                    <hr>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="usr_name">
                            User Name
                            <span class='require'>*</span>
                        </label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-fw fa-user-md text-primary"></i>
                                </span>
                                <input type="text" class="form-control" id="usr_name" placeholder="Username"
                                       name="username">
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="mail">
                            Email
                            <span class='require'>*</span>
                        </label>
                        <div class="col-md-7">
                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-envelope text-primary"></i>
                                                            </span>
                                <input type="email" placeholder="Email Address" class="form-control" id="mail"
                                       name="email"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="contact">
                            Contact Number
                            <span class='require'>*</span>
                        </label>
                        <div class="col-md-7">
                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-phone text-primary"></i>
                                                            </span>
                                <input type="text" placeholder="Phone Number" id="contact" class="form-control"
                                       name="phone_number"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3  control-label">
                            Gender
                            <span class='require'>*</span>
                        </label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <label style="padding-right:30px">
                                    <input class="radio_val" type="radio" name="gender" value="male"/> Male
                                </label>
                                <label class="pad-left" style="padding-right:30px">
                                    <input class="radio_val" type="radio" name="gender" value="female"/> Female
                                </label>
                                <label class="pad-left">
                                    <input class="radio_val" type="radio" name="gender" value="others"/> Other
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="addr">
                            Address
                            <span class='require'>*</span>
                        </label>
                        <div class="col-md-7">
                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-plus text-primary"></i>

                                                            </span>
                                <input type="text" class="form-control" id="addr" placeholder="Address" name="address">
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="city">
                            City
                            <span class='require'>*</span>
                        </label>
                        <div class="col-md-7">
                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-plus text-primary"></i>
                                                            </span>
                                <input type="text" class="form-control" id="city" placeholder="City" name="city">
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="pin">
                            Pin Code
                            <span class='require'>*</span>
                        </label>
                        <div class="col-md-7">
                            <div class="input-group">
                                                            <span class="input-group-addon">
                                                                 <i class="fa fa-plus text-primary"></i>
                                                            </span>
                                <input type="text" class="form-control" placeholder="Pin Code" id="pin" name="pincode">
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <input type="submit" class="btn btn-primary" value="Add"> &nbsp;
                                <input type="button" class="btn btn-danger" value="Cancel"> &nbsp;
                                <input type="reset" class="btn btn-default " value="Reset">
                            </div>
                        </div>
                    </div>
                    </form>


                </div>
            </div>

        </div>
    </div>

            <!---->
            <!--            <script>$(document).ready( function() {-->
            <!--                    $(document).on('change', '.btn-file :file', function() {-->
            <!--                        var input = $(this),-->
            <!--                            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');-->
            <!--                        input.trigger('fileselect', [label]);-->
            <!--                    });-->
            <!---->
            <!--                    $('.btn-file :file').on('fileselect', function(event, label) {-->
            <!---->
            <!--                        var input = $(this).parents('.input-group').find(':text'),-->
            <!--                            log = label;-->
            <!---->
            <!--                        if( input.length ) {-->
            <!--                            input.val(log);-->
            <!--                        } else {-->
            <!--                            if( log ) alert(log);-->
            <!--                        }-->
            <!---->
            <!--                    });-->
            <!--                    function readURL(input) {-->
            <!--                        if (input.files && input.files[0]) {-->
            <!--                            var reader = new FileReader();-->
            <!---->
            <!--                            reader.onload = function (e) {-->
            <!--                                $('#img-upload').attr('src', e.target.result);-->
            <!--                            }-->
            <!---->
            <!--                            reader.readAsDataURL(input.files[0]);-->
            <!--                        }-->
            <!--                    }-->
            <!---->
            <!--                    $("#imgInp").change(function(){-->
            <!--                        readURL(this);-->
            <!--                    });-->
            <!--                });</script>-->
            <!---->
            <!---->


            <script>           function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah')
                                .attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }


            </script>


            <!-- /#wrapper -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                    crossorigin="anonymous"></script>
            <script src="<?php echo base_url(); ?>app/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>app/js/index.js" type="text/javascript"></script>

</body>
</html>
