<?php
   include '../database/config.php';
   if(!isset($_SESSION['login_user'])){
     header("location: ../index.php");
   }   
   $permissions=$_SESSION['permissions'];
   if($permissions!=''){
      $permissions=explode(',',$permissions);
   }else{
      $permissions=array();
   }

?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>EXAMPUR </title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
      <header class="main-header">
         <!-- Logo -->
         <a href="javascript:void();" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>ALT</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>EXAMPUR</span>
         </a>
         <!-- Header Navbar: style can be found in header.less -->
         <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
               <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $_SESSION['login_user']; ?></span>
                     </a>
                     <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                           <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                           <p>
                              <?php echo $_SESSION['login_user']; ?>
                              <small>Member since Nov. 2012</small>
                           </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                           <div class="pull-right">
                              <a href="signout.php" class="btn btn-default btn-flat">Sign out</a>
                           </div>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
         <!-- sidebar: style can be found in sidebar.less -->
         <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
               <div class="pull-left image">
                  <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
               </div>
               <div class="pull-left info">
                  <p><?php echo $_SESSION['login_user']; ?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
               </div>
            </div>
            
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
               <li class="header">MAIN NAVIGATION</li>
               <li class="active">
                  <a href="dashboard.php">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  <span class="pull-right-container">
                  </span>
                  </a>
               </li>
               <?php if(in_array(1,$permissions)){ ?>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-th"></i> <span>Featured Video</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="featureAdd.php"><i class="fa fa-circle-o"></i> Add Featured Video </a></li>
                        <li><a href="featurelist.php"><i class="fa fa-circle-o"></i> List Featured Video</a></li>
                     </ul>
                  </li>
               <?php } ?>
               <?php if(in_array(2,$permissions)){ ?>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-pie-chart"></i> <span>Exampur Special</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="exampuradd.php"><i class="fa fa-circle-o"></i> Add Exampur Video </a></li>
                        <li><a href="listexampurspecial.php"><i class="fa fa-circle-o"></i> List Exampur Video</a></li>
                     </ul>
                  </li>
               <?php } ?>
               <?php if(in_array(3,$permissions)){ ?>
                  <li class=" treeview">
                     <a href="#">
                     <i class="fa fa-laptop"></i> <span>Concept </span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="addconcept.php"><i class="fa fa-circle-o"></i> Add Concept  </a></li>
                        <li><a href="listconcept.php"><i class="fa fa-circle-o"></i> List Concept </a></li>
                     </ul>
                  </li>
               <?php } ?>  
               <?php if(in_array(4,$permissions)){ ?> 
               <li class=" treeview">
                  <a href="#">
                  <i class="fa fa-edit"></i> <span>Exam </span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="addexam.php"><i class="fa fa-circle-o"></i> Add Exam  </a></li>
                     <li><a href="examlist.php"><i class="fa fa-circle-o"></i> List Exam </a></li>
                  </ul>
               </li>
               <?php } ?>
               <?php if(in_array(5,$permissions)){ ?>
                  <li class=" treeview">
                     <a href="#">
                     <i class="fa fa-book"></i> <span>Subjects </span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="addsubject.php"><i class="fa fa-circle-o"></i> Add Subjects  </a></li>
                        <li><a href="listsubject.php"><i class="fa fa-circle-o"></i> List Subjects </a></li>
                     </ul>
                  </li>
               <?php } ?>
               <?php if(in_array(6,$permissions)){ ?>
                  <li class=" treeview">
                     <a href="#">
                     <i class="fa fa-university"></i> <span>Current Affair </span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="addcurrentaffair.php"><i class="fa fa-circle-o"></i> Add Current Affair  </a></li>
                        
                        <li><a href="currentaffairlist.php?status=1"><i class="fa fa-circle-o"></i> Daily  Current Affair </a></li>
                        <li><a href="currentaffairlist.php?status=2"><i class="fa fa-circle-o"></i> Monthly Current Affair </a></li>
                     </ul>
                  </li>
               <?php } ?>
               <?php if(in_array(7,$permissions)){ ?>
                  <li>
                     <a href="allpurchase.php">
                     <i class="fa fa-cube"></i> <span>Purchases </span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
               <?php } ?>   
               <?php if(in_array(8,$permissions)){ ?>
                  <li>
                     <a href="users.php">
                     <i class="fa fa-users"></i> <span>Users </span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
               <?php } ?>  
               <?php if(in_array(9,$permissions)){ ?>                
                  <li class=" treeview">
                     <a href="#">
                     <i class="fa fa-folder-open"></i> <span>Study Material </span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="addstudymaterial.php"><i class="fa fa-circle-o"></i> Add Study Material </a></li>
                        <li><a href="liststudymaterial.php?type=1"><i class="fa fa-circle-o"></i> Ebooks </a></li>
                        <li><a href="liststudymaterial.php?type=2"><i class="fa fa-circle-o"></i> List Notes </a></li>
                        <li><a href="liststudymaterial.php?type=3"><i class="fa fa-circle-o"></i> List Papers </a></li>
                     </ul>
                  </li>
               <?php } ?>
               <?php if(in_array(10,$permissions)){ ?>
                  <li>
                     <a href="help.php">
                     <i class="fa fa-database"></i> <span>Help Request </span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
               <?php } ?>   
               <li >
                  <a href="signout.php">
                  <i class="fa fa-sign-in"></i> <span>Sign Out </span>
                  <span class="pull-right-container">
                  </span>
                  </a>
               </li>
            </ul>
         </section>
         <!-- /.sidebar -->
      </aside>