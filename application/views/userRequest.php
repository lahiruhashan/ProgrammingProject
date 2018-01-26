<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
<!--          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->

    <link rel="stylesheet" href="<?php echo base_url(); ?>/app/css/index.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>


    <!-- Page Contentttt -->
    <div id="page-content-wrapper">


        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>

        <?php else: ?>
        <?php endif; ?>

        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-user-plus" aria-hidden="true"></i> User Requests</div>
                <div class="panel-body">
                    <?php echo form_open('userController/userRequests'); ?>


                    <table class="table table-hover" id="DyanmicTable">
                        <thead>
                        <tr>
                            <!-- <th class="text-center">Item Id</th> -->
                            <th class="text-center"><b>Customer Name</b></th>
                            <th class="text-center"><b>Email</b></th>
                            <th class="text-center"><b>Approved/Not Approved</b></th>
                            <th class="text-center" id="update">
                                <b><i class="fa fa-fw fa-check" aria-hidden="true"></i>
                                    Accept</b>
                            </th>

                            <th class="text-center"><b><i class="fa fa-trash-o fa-lg"></i> Ignore</a></b></th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php if (count($res)): ?>
                            <?php foreach ($res as $row): ?>

                                <tr>

                                    <td class="text-center"><?php echo $row->username; ?></td>
                                    <td class="text-center"><?php echo $row->email; ?></td>
                                    <td class="text-center"><?php if ($row->flag == 0) {
                                            echo "Not approved";
                                        } else {
                                            echo "Approved";
                                        };
                                        ?></td>
                                    <td class="text-center"><a href="acceptUser/<?php echo $row->user_id; ?>">
                                            <button type='button' class='btn btn-success' name="accept">Accept</button>
                                        </a></td>
                                    <td class="text-center"><a href="<?php echo base_url(); ?>/index.php/userController/removeUser/<?php echo $row->user_id ?>">
                                            <button type='button' class='btn btn-danger' name='reject'>Reject</button>
                                        </a></td>
                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>

                            <br>
                            <p style="margin-bottom: 50px;">Search result is zero</p>
                        <?php endif ?>
                        </tbody>
                    </table>

                    <?php echo $link; ?>

                </div>
            </div>


            <?php form_close(); ?>


        </div>
    </div>

    <!-- /#wrapper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>app/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app/js/index.js" type="text/javascript"></script>

</body>
</html>
