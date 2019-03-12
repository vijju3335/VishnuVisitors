<?php
   require("../connect.php");
   require("check.php");
   ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="college automation project">
      <meta name="author" content="vijay">
      <title>Vishnu Visitors | Homepage</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <!-- Add custom CSS here -->
      <link href="../css/sb-admin.css" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   </head>
   <body data-gr-c-s-loaded="true">
      <!--Navbar-->
      <div id="wrapper">
         <!-- Sidebar -->
         <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#"><span><img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Vishnu_Universal_Learning.png/220px-Vishnu_Universal_Learning.png" width="30px" height="30px" alt="VITB logo"/> VVMS</span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
               <ul class="nav navbar-nav side-nav">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li>
                    <a href="#"><i class="fa  fa-credit-card"></i> <span>Gate Pass</span></a>
                  </li>
                  <li><a href="#"><i class="fa fa-users"></i> <span>Staff</span></a></li>
                  <li>
                    <a href="#"><i class="fa fa-users"></i> <span>Students</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa  fa-institution"></i> <span>Gates</span></a>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right navbar-user">
                  <li class="dropdown user-dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  admin<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        <li><a href="membership_profile.php"><i class="fa fa-user"></i> My Profile Settings</a></li>
                        <!--admin area starts-->
                        <li>
                           <a href="admin/pageHome.php" class="btn btn-danger navbar-btn btn-sm hidden-xs"><i class="fa fa-cog"></i> Admin Area</a>
                           <a href="admin/pageHome.php" class="btn btn-danger navbar-btn btn-sm visible-xs btn-sm"><i class="fa fa-cog"></i> Admin Area</a>
                           <ul class="nav navbar-nav navbar-right hidden-xs" style="min-width: 330px;">
                           </ul>
                           <ul class="nav navbar-nav visible-xs">
                           </ul>
                        </li>
                        <!--admin area ends-->
                        <li class="divider"></li>
                        <li><a class="btn navbar-btn btn-primary" href="../Accounts/logout.php"><i class="fa fa-power-off"></i> Sign Out</a></li>
                     </ul>
                  </li>
               </ul>
               </li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </nav>
         <div id="page-wrapper">
            <div class="row">
               <div class="col-lg-12">
                  <h1><small> Vishnu Visitors Management System</small></h1>
                  <ol class="breadcrumb">
                     <li><a href="admin.php" style="text-decoration: none;"><i class="icon-dashboard"></i><strong>VVMS</strong></a></li>
                     <li class="active"><i class="icon-file-alt"></i><strong>Dashboard</strong></li>
                  </ol>
               </div>
            </div>
            <!-- /.row -->
            <!-- JavaScript -->
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

            <title>Home</title>
            <div class="row">
               <div class="col-lg-3">
                  <div class="panel panel-info">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-6">
                              <i class="fa fa-credit-card fa-5x"></i>
                           </div>
                           <div class="col-xs-6 text-right">
                              <p class="announcement-heading">0</p>
                              <p class="announcement-text"><strong>Gatepass</strong></p>
                           </div>
                        </div>
                     </div>
                     <a href="gatepass_view.php">
                        <div class="panel-footer announcement-bottom">
                           <div class="row">
                              <div class="col-xs-6">
                                 <strong>Details</strong>
                              </div>
                              <div class="col-xs-6 text-right">
                                 <i class="fa fa-arrow-circle-right"></i>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="panel panel-warning">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-6">
                              <i class="fa fa-users fa-5x"></i>
                           </div>
                           <div class="col-xs-6 text-right">
                              <p class="announcement-heading">0</p>
                              <p class="announcement-text"><strong>Staff</strong></p>
                           </div>
                        </div>
                     </div>
                     <a href="staff_view.php">
                        <div class="panel-footer announcement-bottom">
                           <div class="row">
                              <div class="col-xs-6">
                                 <strong>Details</strong>
                              </div>
                              <div class="col-xs-6 text-right">
                                 <i class="fa fa-arrow-circle-right"></i>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               
               <div class="col-lg-3">
                  <div class="panel panel-danger">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-6">
                              <i class="fa fa-users fa-5x"></i>
                           </div>
                           <div class="col-xs-6 text-right">
                              <p class="announcement-heading">0</p>
                              <p class="announcement-text"><strong>Students</strong></p>
                           </div>
                        </div>
                     </div>
                     <a href="kikundi_view.php">
                        <div class="panel-footer announcement-bottom">
                           <div class="row">
                              <div class="col-xs-6">
                                 <strong>Details</strong>
                              </div>
                              <div class="col-xs-6 text-right">
                                 <i class="fa fa-arrow-circle-right"></i>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="panel panel-danger">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-6">
                              <i class="fa fa-institution fa-5x"></i>
                           </div>
                           <div class="col-xs-6 text-right">
                              <p class="announcement-heading">0</p>
                              <p class="announcement-text"><strong>Gates</strong></p>
                           </div>
                        </div>
                     </div>
                     <a href="gates_view.php">
                        <div class="panel-footer announcement-bottom">
                           <div class="row">
                              <div class="col-xs-6">
                                 <strong>Details</strong>
                              </div>
                              <div class="col-xs-6 text-right">
                                 <i class="fa fa-arrow-circle-right"></i>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <!-- /.row -->
            <!--next row-->
            <div class="row">
               <div class="col-lg-3">
                  <div class="panel panel-warning">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-6">
                              <i class="fa fa-street-view fa-5x"></i>
                           </div>
                           <div class="col-xs-6 text-right">
                              <p class="announcement-heading">0</p>
                              <p class="announcement-text"><strong>Visits</strong></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> 
               
               
            </div>
            <!--row ends here-->
            <style>
               .panel-body-description{
               margin-top: 10px;
               height: 100px;
               overflow: auto;
               }
               .panel-body .btn img{
               margin: 0 10px;
               max-height: 32px;
               }
            </style>
            
      </div>
   </body>
</html>