<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/logo.png">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/simple-sidebar.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/DataTables-1.10.9/DataTables-1.10.9/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/DataTables-1.10.9/DataTables-1.10.9/media/css/jquery.DataTables.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery-2.2.2.min.js"></script>
    <!-- <script src="<?=base_url()?>assets/myjs.js"></script> -->
    <script src="<?=base_url()?>assets/DataTables-1.10.9/DataTables-1.10.9/media/js/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>assets/DataTables-1.10.9/DataTables-1.10.9/media/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/ckeditor_4.5.4_standard/ckeditor/ckeditor.js"></script>

    <?php 
        include './assets/myjs.php';
    ?>
    
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
  <nav class="navbar navbar-default no-margin navbar-fixed-top">
    <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header fixed-brand">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
                      <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                    </button>
                    <a class="navbar-brand" href="#"> BMT La-Tahzan</a>
                </div><!-- navbar-header-->
 
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active" ><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#"><span class="glyphicon glyphicon-user">
                                </span> <?=$this->session->userdata('nama')?></a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>login/logout"><span class="glyphicon glyphicon-log-in">
                                </span> Keluar &nbsp;&nbsp;</a>
                                </li>
                            </ul>
                </div><!-- bs-example-navbar-collapse-1 -->
    </nav>
    
    <div id="wrapper">
