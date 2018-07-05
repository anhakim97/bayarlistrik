<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="<?php echo base_url(); ?>asset/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/admin/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/admin/css/sb-admin.css" rel="stylesheet">

</head>

<body>
    <script src="<?php echo base_url(); ?>asset/admin/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/js/sb-admin.js"></script>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">BayarListrik.Com</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li>Hai, <?php echo $this->session->userdata("nama"); ?></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('agen/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('agen/index'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('agen/pascabayar'); ?>"><i class="fa fa-dashboard fa-fw"></i> Pembayaran Listrik </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('agen/deposit'); ?>"><i class="fa fa-dashboard fa-fw"></i> Deposit</a>
                        </li>
                        
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profile</h4>
        </div>
        <div class="modal-body">
                                                  <?php  foreach ($data_agen->result_array() as $row) {
                                            ?>
                        <form action="<?php echo base_url('agen/updateprofil'); ?>" method="post">
                            <div class="form-group">

                                <input id="id_agen" type="number" name="id_agen" value="<?=$row['id_agen'];?>" hidden><br>
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?=$row['nama'];?>" readonly>
                                <label for="email">email</label>
                                <input type="email" name="email" class="form-control" value="<?=$row['email'];?>"readonly>
                                 <label for="saldo">Saldo</label>
                                <input type="text" name="saldo" class="form-control" value="Rp. <?=$row['saldo'];?>,-"readonly>


                            </div>
                            <!--<input type="submit" id="submit" class="btn btn-default " name="submit" value="Submit" onclick="alert('Data Berhasil diupdate')">-->
                          </form>
                                            <?php
                                            } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>