<?php
   require("../connect.php");
   session_start();
   ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="college automation project">
      <meta name="author" content="vijay">
      <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Vishnu_Universal_Learning.png/220px-Vishnu_Universal_Learning.png" type="image/x-icon">
      <title>Vishnu Visitors | Inside page</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <!-- JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <!-- Add custom CSS here -->
      <link href="../css/sb-admin.css" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   </head>
   <body>
      <!--Navbar-->
      <div id="wrapper">
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">             
            <a class="navbar-brand" href="#"><span><img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Vishnu_Universal_Learning.png/220px-Vishnu_Universal_Learning.png" width="60px" height="60px" alt="VITB logo"/><strong> VVMS</strong></span></a>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
               <li><a href="guard.php"><i class="fa fa-home fa-2x"></i><span>  Dashboard</span></a></li>
               <li><a href="visitors_log.php"><i class="fa  fa-users fa-2x"></i><span>  Visitors Log</span></a></li>
               <li><a href="guard.php"><i class="fa fa-user-tie fa-2x"></i><span>  Guest Pass</span></a></li>
               <li><a href="verify_visitor.php"><i class="fa fa-user-friends fa-2x"></i><span>  Parents Pass</span></a></li>
               <li><a href="visitors_inside.php"><i class="fa fa-users fa-2x"></i><span>  Visitors Inside</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-user">
               <li class="dropdown user-dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  guard<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                     <!--admin area ends-->
                     <li><a class="btn  btn-primary" href="../Accounts/logout.php"><i class="fa fa-power-off"></i> Sign Out</a></li>
                  </ul>
               </li>
            </ul>
         </div>
         <!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
         <div class="row">
            <div class="col-lg-12">
               <h1 style="margin-top: 0px;"><small> Vishnu Visitors Management System</small></h1>
               <ol class="breadcrumb">
                  <li><a href="guard.php" style="text-decoration: none;"><i class="icon-dashboard"></i><strong>VVMS</strong></a></li>
                  <li><i class="icon-file-alt"></i><a href="guard.php" style="text-decoration: none;"><strong>Dashboard</strong></a></li>
                  <li class="active"><i class="icon-file-alt"></i><strong>Visitors Inside</strong></li>
               </ol>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-lg-11">
                  <div class="form-group">
                     <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-11">
                  <div class="form-group">
                     <table class="table table-striped table-bordered" style="text-align: center;">
                        <thead>
                           <tr>
                              <th>Id</th>
                              <th>Visitor Name</th>
                              <th>Visitor Ph</th>
                              <th>Pass Type</th>
                              <th>Purpose</th>
                              <th>No of Persons</th>
                              <th>Host Name</th>
                              <th>Host Id</th>
                              <th>Proof type</th>
                              <th>Proof No</th>
                              <th>Date</th>
                              <th>In Time</th>
                              <th>Out Time</th>
                           </tr>
                        </thead>
                        <tbody id="myTable">
                           <?php
                              $sql = "SELECT * FROM `visitor_log` WHERE out_time='NA'";
                              if($res = mysqli_query($conn,$sql)){
                                while($row = mysqli_fetch_array($res)){
                                  echo '<tr>';
                                  echo '<td>'.$row[0].'</td>';
                                  echo '<td>'.$row[1].'</td>';
                                  echo '<td>'.$row[2].'</td>';
                                  echo '<td>'.$row[3].'</td>';
                                  echo '<td>'.$row[5].'</td>';
                                  echo '<td>'.$row[6].'</td>';
                                  echo '<td>'.$row[7].'</td>';
                                  echo '<td>'.$row[8].'</td>';
                                  echo '<td>'.$row[9].'</td>';
                                  echo '<td>'.$row[10].'</td>';
                                  echo '<td>'.$row[11].'</td>';
                                  echo '<td>'.$row[12].'</td>';
                                  echo '<td>'.$row[13].'</td>';
                                  echo '</tr>';
                                }
                              }
                              
                              ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Id</th>
                              <th>Visitor Name</th>
                              <th>Visitor Ph</th>
                              <th>Pass Type</th>
                              <th>Purpose</th>
                              <th>No of Persons</th>
                              <th>Host Name</th>
                              <th>Host Id</th>
                              <th>Proof type</th>
                              <th>Proof No</th>
                              <th>Date</th>
                              <th>In Time</th>
                              <th>Out Time</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
      </script>
   </body>
</html>
