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
    <style type="text/css">
        body {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px;
        }

        #wrapper {
            padding: 20px;
        }

        .pagination pagination-lg prev next current {
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
    </style>


</head>
<body style="background-color: #151515">
    <!-- /#page-content-wrapper -->
    <div class="container">
        <div class="panel panel-success">
            <div class="panel-heading"><i class="fa fa-money="></i> Add Trainer</div>
            <div class="panel-body">
                <?php echo form_open('userController/addTrainer'); ?>
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
                                   placeholder="Enter trainer's name">
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
                            <i class="fa fa-fw fa-id-card-o"></i>
                        </span>
                            <input type="text" name="nic" id="nic" class="form-control" placeholder="Enter NIC">
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
                            <i class="fa fa-fw fa-phone"></i>
                        </span>
                            <input type="text" name="tpNo" id="tpNo" class="form-control"
                                   placeholder="Enter Telephone Number">
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Email Addres
                        <span class="require">*</span>
                    </label>

                    <div class="col-md-7">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-fw fa-envelope"></i>
                        </span>
                            <input type="email" name="email" id="email" class="form-control"
                                   placeholder="Enter Email Address">
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>


                <div class="col-md-offset-5 col-md-9">
                    <button type="submit" class="btn btn-primary" value="Add" name="add">Add</button>
                </div>


            </div>
        </div>
    </div>


<br>
<br>
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


    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-money"></i> Present Trainers</div>
        <div class="panel-body">



            <div class="form-group form-inline pull-right">
                <input type="text" class="form-control col-lg-8 "  placeholder="Enter any keyword.." name="search">&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default" name="searchbtn"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                <hr>
            </div>
            <br>



            <table class="table table-striped" id="DyanmicTable">
                <thead>
                <tr>
                    <!-- <th class="text-center">Item Id</th> -->
                    <th class="text-center"><b>Trainer's Name</b></th>
                    <th class="text-center"><b>NIC</b></th>
                    <th class="text-center"><b>Contact Number</b></th>
                    <th class="text-center"><b>Email</b></th>
                    <th class="text-center" id="update">
                        <b><i class="fa fa-lg fa-pencil-square-o"></i> Edit</b>
                    </th>

                    <th class="text-center"><b><i class="fa fa-trash-o fa-lg"></i> Delete</a></b></th>

                </tr>
                </thead>

                <tbody>
                <?php if (count($res)): ?>
                    <?php foreach ($res as $row): ?>

                        <tr>

                            <td class="text-center"><?php echo $row->trainer_name; ?></td>
                            <td class="text-center"><?php echo $row->nic; ?></td>
                            <td class="text-center"><?php echo $row->contact_no; ?></td>
                            <td class="text-center"><?php echo $row->email_address; ?></td>
                            <td class="text-center"><a href="editTrainer/<?php echo $row->trainer_id; ?>">
                                    <button type='button' class='btn btn-primary' name="update">Edit</button>
                                </a></td>
                            <td class="text-center"><a href="deleteTrainer/<?php echo $row->trainer_id ?>">
                                    <button type='button' class='btn btn-danger' name='delete'>Remove</button>
                                </a></td>
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
