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
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body style="background-color: #151515">






    <!-- /#page-content-wrapper -->
    <div class="container">







        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php  } ?>
        <?php if ($this->session->flashdata('error')) {?>
            <div class="alert alert-success alert-dismissible" role="alert">
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













        <div class="panel panel-success">
            <div class="panel-heading"><i class="fa fa-money"></i> Edit Trainer</div>
            <div class="panel-body">
                <?php echo form_open('userController/editTrainer/'.$res->trainer_id); ?>
                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Trainer Name
                        <span class="require">*</span>
                    </label>
                    <div class="col-md-7">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-fw fa-file-text-o"></i>
                        </span>
                            <input type="text" name="trainername" id="trainername" class="form-control"
                                   value="<?php echo $res->trainer_name ;?>" >
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">
                        NIC
                        <span class="require">*</span>
                    </label>

                    <div class="col-md-7">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i  class="fa fa-fw fa-id-card-o"></i>
                        </span>
                            <input type="text" name="nic" id="nic" class="form-control" value="<?php echo $res->nic;?>">
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Telephone Number
                        <span class="require">*</span>
                    </label>

                    <div class="col-md-7">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-fw fa-mobile"></i>
                        </span>
                            <input type="text" name="tpNo" id="tpNo" class="form-control"
                                   value="<?php echo $res->contact_no;?>">
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Email Address
                        <span class="require">*</span>
                    </label>

                    <div class="col-md-7">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-fw fa-envelope"></i>
                        </span>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="<?php echo $res->email_address;?>">
                        </div>
                    </div>
                </div>


                <br>
                <br>
                <br>
                <br>



                <div class="col-md-offset-4 col-md-9">

                    <button type="submit" class="btn btn-primary" value="update" name="update">Submit</button>
                    <button type="submit" class="btn btn-info" value="update" name="back"><a href="<?php echo base_url();?>index.php/userController/addTrainer">Back</a></button>
                </div>



            </div>
        </div>
    </div>


<br>
<br>
<br>




<!-- /#wrapper -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>app/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>app/js/index.js" type="text/javascript"></script>

</body>
</html>
