<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <base href="<?= site_url(); ?>">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= APP_NAME ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <style>
      
      tr:hover{
          background-color:#4a4a4a!important;
          color:white;
          
      }
      tbody tr td img {
          text-align: center!important;
           display: block!important;
  margin-left: auto!important;
  margin-right: auto!important; 
      }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js" type="text/javascript" ></script>
  <style type="text/css">
    #xcrud-modal-window img{
      width: 100%
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Rishabh Manufacturers</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Rishabh Manufacturers</b> </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
           
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
         
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
    
          <!-- User Account: style can be found in dropdown.less -->
          <?php $chil_url = $this->uri->slash_segment(1); $chil_url2 = $this->uri->slash_segment(2); ?>
          <li class="dropdown user user-menu">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/dist/img/admin.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a> 
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="height: 105px;">
                <img src="assets/dist/img/admin.jpg" class="img-circle" alt="User Image">

                <!-- <p>
                  <small>Member since Nov. 2012</small>
                </p> -->
              </li>
              <!-- Menu Body -->
              <!--  <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </dv>
              </li>  -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/dist/img/admin.jpg" class="img-circle" alt="User Image">
        </div>
        

            <div class="pull-left info">
              <p>Admin</p>
            <!--   <?php
              $user = '';
              if($this->session->userdata("loged_in")){
                $user = $this->m_tools->getAdminInfo();
                ?>
                <a href="recharge_history"><i class="fa fa-circle text-success"></i> Wallet :  <?= $user['wallet'] ?></a>
                <?php

              } else {
                echo '<a href="javascript:;"><i class="fa fa-circle text-success"></i> Wallet </a>';
              }
              ?> -->
            </div>


      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <!-- <li>
          <a href="home/">
            <i class="fa fa-dashboard"></i> Dashboard
          </a>
        </li> -->
       
       <li class="<?= ($chil_url == 'blank/' ) ? 'active' : '' ?>">
          <a href="blank">
            <i class="fa fa-bars"></i> Blank
          </a>
        </li>
       
       <li class="<?= ($chil_url == 'bottom/' ) ? 'active' : '' ?>">
          <a href="bottom">
            <i class="fa fa-bars"></i> Bottom
          </a>
        </li>
        
       
        <li class="<?= ($chil_url == 'users/' ) ? 'active' : '' ?>">
          <a href="users/">
            <i class="fa fa-bars"></i> Order
          </a>
        </li>
        
         <li class="<?= ($chil_url == 'task/' ) ? 'active' : '' ?>">
          <a href="task">
            <i class="fa fa-bars"></i> Task
          </a>
        </li>
        <li class="<?= ($chil_url == 'employee/' ) ? 'active' : '' ?>">
          <a href="employee">
            <i class="fa fa-bars"></i> Users
          </a>
        </li>

        
        <li class="<?= ($chil_url == 'city/') ? 'active' : '' ?>">
          <a href="city">
            <i class="fa fa-bars"></i> City
          </a>
        </li>
       
        

        
        
        
        <li class="<?= ($chil_url == 'register/' ) ? 'active' : '' ?>">
          <a href="register">
            <i class="fa fa-bars"></i> Sign Up
          </a>
        </li>
        
       
       
       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->