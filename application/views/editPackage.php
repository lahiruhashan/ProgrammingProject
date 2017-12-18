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

</head>
<body>

    <!-- Page Content -->
    <div id="page-content-wrapper">









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












    </div>
    <!-- /#page-content-wrapper -->
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-money"></i> Add Package</div>
            <div class="panel-body">
                <?php echo form_open('userController/editPackage/'.$res->package_id); ?>
                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Package Name
                        <span class="require">*</span>
                    </label>
                    <div class="col-md-7">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-fw fa-file-text-o"></i>
                        </span>
                            <input type="text" name="pckname" id="pckname" class="form-control"
                                   value="<?php echo $res->package_name;?>" >
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="start">
                        Start *
                    </label>
                    <div class="col-md-3">
                        <div class="input-group date datetimepicker6">
                            <input type="text" class="form-control" id="start" name="datepicker1" data-bv-field="date_start" value="<?php echo $res->start_date;?>">
                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="date_start" data-bv-result="NOT_VALIDATED" style="display: none;">The start date is required and cannot be empty</small></div>
                    <label class="col-md-1 control-label" for="end">
                        End *
                    </label>
                    <div class="col-md-3">
                        <div class="input-group date datetimepicker7">
                            <input type="text" class="form-control" id="end" name="datepicker2" data-bv-field="date_end" value="<?php echo $res->end_date;?>">
                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                        </div>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="date_end" data-bv-result="NOT_VALIDATED" style="display: none;">The end date is required and cannot be empty</small></div>
                </div>


                <br>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Package Fee
                        <span class="require">*</span>
                    </label>

                    <div class="col-md-7">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-fw fa-money"></i>
                        </span>
                            <input type="text" name="pckfee" id="pckfee" class="form-control"
                                   value="<?php echo $res->pck_fee;?>">
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Description
                        <span class="require">*</span>
                    </label>

                    <div class="col-md-7">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-paragraph" aria-hidden="true"></i>
                        </span>
                            <input type="textarea" name="description" id="description" class="form-control"
                                   value="<?php echo $res->description;?>">
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>


                <div class="col-md-offset-5 col-md-9">
                    <button type="submit" class="btn btn-primary" value="Add" name="update">Update</button>
                    <button type="submit" class="btn btn-info" value="update" name="back"><a href="<?php echo base_url();?>index.php/userController/addPackage">Back</a></button>
                </div>



            </div>
        </div>
    </div>


<br>
<br>
<br>



























<script>
    $(function(){
        $('.datepicker1').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
    });
</script>

<script>
    $(function(){
        $('.datepicker2').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
    });
</script>


<script src="<?php echo base_url(); ?>assets1/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets1/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>




<!-- /#wrapper -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>app/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>app/js/index.js" type="text/javascript"></script>

</body>
</html>
