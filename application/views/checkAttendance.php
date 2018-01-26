<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<br>
<br>

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
        <div class="panel-heading"><i class="fa fa-lg fa-fw fa-user"></i> Check Attendance</div>
        <div class="panel-body">
            <?php echo form_open('userController/attendance'); ?>




            <br>
            <br>


            <div class="form-group form-inline pull-right">
                <input type="text" class="form-control col-lg-8 "  placeholder="Enter any keyword.." name="search">&nbsp;
                <button type="submit" class="btn btn-default" name="searchbtn"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                <hr>
            </div>
            <br>


            <table class="table table-hover" id="DyanmicTable">

                <thead>
                <tr>

                    <th class="text-center"><b>Username</b></th>
                    <th class="text-center"><b>Contact Number</b></th>
                    <th class="text-center"><b>Attendance</b></th>


                </tr>
                </thead>

                <?php if (count($res)): ?>
                    <?php foreach ($res as $row): ?>


                <tbody>
                        <tr>
                            <td class="text-center"><?php echo $row->user_id; ?></td>
                            <td class="text-center"><?php echo $row->contact_number; ?></td>
                            <td class="text-center"><input name="attendance" type="radio" value="Present"> Present     <input name="attendance" type="radio" value="Absent"> Absent  </td>
                        </tr>

                    <?php endforeach; ?>
                <?php else: ?>

                    <br>
                    <p style="margin-bottom: 50px;">Search result is zero</p>
                <?php endif ?>
                </tbody>
            </table>

            <br>
            <br>

        </div>
    </div>

    <?php form_close(); ?>


</div>





<!-- /#wrapper -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>app/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>app/js/index.js" type="text/javascript"></script>

</body>
</html>
