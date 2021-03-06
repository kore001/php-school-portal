<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php $title = isset($this->title)? $this->title: 'School Board'; echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link href="<?php echo URL; ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="<?php echo URL; ?>public/custom/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> <?php echo Session::get('school_name'); ?>
                    <small class="pull-right">Date: <?php echo(date('d/m/Y')); ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <b>Session:</b> <?php echo Session::get('academic_session_name'); ?><br>
                <br>
            </div>
            <div class="col-sm-4 invoice-col"> &nbsp; </div>
            <div class="col-sm-4 invoice-col">
                <b>Class:</b> <?php echo Session::get('academic_class_name'); ?><br>
            </div>
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive ">
                <table class="table table-striped table-bordered">

                    <?php
                        if(isset($this->students)){
                            ?>
                            <?php echo $this->students;  ?>

                        <?php }  ?>



                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
