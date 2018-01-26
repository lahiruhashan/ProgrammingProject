<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dateTime/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>


<!-- /#page-content-wrapper -->
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


    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-fw fa-file-text-o"></i>Mark Attendance</div>
        <div class="panel-body">
            <?php echo form_open('userController/markAttendance'); ?>

            <br>
            <br>
            <br>

            <div class="form-group">
                <label class="col-md-3 control-label" for="start">
                    Date *
                </label>
                <div class="col-md-3">
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control" name="datepicker1" placeholder="Select Date">
                        <div class="input-group-addon">
                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>

                        <div class="col-md-3"><a href="markAttendance">
                                <button type='submit' class='btn btn-info' name='searchbtn'>Search</button>
                            </a>
                        </div>
                    </div>

                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="date_start"
                           data-bv-result="NOT_VALIDATED" style="display: none;">The start date is required and
                        cannot be empty
                    </small>
                </div>
<?php echo form_close();?>
            </div>
        </div>


    </div>

    <br>
    <br>
    <br>
    <br>



<br>
<br>
<br>


<script>
    $(function () {
        $('.datepicker1').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
    });
</script>


<script src="<?php echo base_url(); ?>assets/dateTime/js/bootstrap-datepicker.min.js"></script>


<script src="<?php echo base_url(); ?>assets/dateTime/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dateTime/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<!-- /#wrapper -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>app/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>app/js/index.js" type="text/javascript"></script>

</body>
</html>
