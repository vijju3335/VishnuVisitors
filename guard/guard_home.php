<?php
   include_once('../connect.php');
   session_start();
   $search='';
   $succ='';
   $ok=0;
   $_SESSION['ok']=$ok;
   if(isset($_POST['check'])){
      $username = $_POST['search_id']; 
      $sql = "SELECT * FROM students WHERE username = '$username'";
      $res = mysqli_query($conn,$sql);
      if ($res->num_rows > 0) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION["username"]=$row['username'];
            $_SESSION['ok']=1;
       header("Refresh:10; url=pass.php");
      }
   }
   
   ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="shortcut icon" href="http://vishnu.edu.in/upload_news/newlogo.bmp" type="image/x-icon">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Guard Home Page</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="guard_home.css">
   </head>
   <style type="text/css">
      img{
      margin-right: 15px;
      }
      .search-container{
      float: right;
      }
      input[type=text] {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
      }
      .search-container button {
      background: none;
      padding: 6px 10px;
      margin-top: 8px;
      margin-right: 16px;
      font-size: 17px;
      border: none;
      cursor: pointer;
      }
      .search-container button:hover {
      background: none;
      }
      @media screen and (max-width: 600px) {
      .search-container {
      float: none;
      }
      input[type=text],.search-container button {
      display: block;
      text-align: left;
      width: 100%;
      margin: 0;
      padding: 14px;
      }
   </style>
   <body>
      <a href="guard_home.php">
      <i class="fa fa-arrow-circle-left" style="margin:20px 0px 0px 20px;font-size:36px"></i>
      </a>
      <a style="float:right;text-decoration:none;margin:20px 20px 20px 0px;font-size:18px" href="../Accounts/logout.php">
      <span class="glyphicon glyphicon-log-out"></span> Logout
      </a>
      <div class="container">
         <div class="row">
            <div class="col-md-4 col-md-offset-3" style="padding-top: 10px;">
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = POST>
                  <div >
                     <input type="text" name="search_id" id="search" placeholder="search">
                     <input type="submit" name="check" value="search">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="content">
         <div class="animated fadeIn">
            <div class="row" style="margin-top: 20px;">
               <div class="col-xs-6 col-sm-4" style="margin-left: 100px;">
                  <div class="card">
                     <div class="card-header">
                        <strong>Student</strong>
                     </div>
                     <div class="card-body card-block">
                        <?php
                           if($_SESSION['ok']==1) {
                              $username =$_SESSION["username"];
                              $sql = "SELECT * FROM students where username='$username'";
                              $res = mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_array($res)){
                                 echo  "<img src='uploads/".$row['image']."'";
                                 echo 'class="img-responsive" style="width:60%;height:55%;float: left;" alt="Image">
                              
                                 <div style="margin-left: 250px;font-size:16px;"> 
                                    <span>Name : '.$row['name'].'</span><br>
                                    <span>Register No : '.$row['username'].'</span><br>
                                    <span>Hostel Name : '.$row['name'].'</span><br>
                                    <span>College : '.$row['college'].'</span><br>
                                    <span>Course : '.$row['course'].'</span><br>
                                    <span>Branch : '.$row['branch'].'</span><br>
                                    <span>Phone No : '.$row['ph'].'</span><br>
                                 </div>';
                              }
                           }
                           else {
                              echo  "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOOigxPC1OtYYo1yJ2tJdBh_a7Nx4c23HUFw0kxZHQHiQ8pT2d'".'class="img-responsive" style="width:60%;height:55%;float: left;" alt="Image">
                           
                              <div style="margin-left: 250px;font-size:16px;"> 
                                 <span>No Data Found</span><br>
                              </div>';
                           }      
                           ?>
                        <!--<div style="margin-left: 250px;"> 
                           <form method="POST" enctype="multipart/form-data" action="gate pass bs.php">
                              <input type="hidden" name="size" value="100000000">
                              <input type="file" name="image" >
                              <input type="submit" name="upload" value="upload">
                           
                           </form>
                           
                           </div>-->
                     </div>
                     <br>
                  </div>
               </div>
               <div class="col-xs-6 col-sm-4">
                  <div class="card">
                     <div class="card-header">
                        <strong class="card-title">Guard 1</strong>
                     </div>
                     <div class="card-body">
                        <?php
                           if($_SESSION['ok']==1) {
                              $st_id = $_SESSION['username'];
                              $sql = "SELECT * FROM guardians where st_id='$st_id' AND guard_no=1";
                              $res = mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_array($res)){
                                 echo  "<img src='uploads/".$row['image']."'";
                                 echo 'class="img-responsive" style="width:60%;height:55%;float: left;" alt="Image">
                                 <div style="margin-left: 250px;font-size:13px;"> 
                                    <span>Name : '.$row['name'].'</span><br>
                                    <span>Aadhar No : '.$row['aadhar'].'</span><br>
                                    <span>Relation : '.$row['relation'].'</span><br>
                                    <span>Phone No : '.$row['ph'].'</span><br>
                                 </div>';
                                 $_SESSION['name']=$row['name'];
                                 $_SESSION['hostel']=$row['hostel'];
                                 $_SESSION['ph']=$row['ph'];
                                 $_SESSION['img']=$row['image'];
                           
                              }
                           }
                           else{
                              echo  "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOOigxPC1OtYYo1yJ2tJdBh_a7Nx4c23HUFw0kxZHQHiQ8pT2d'".'class="img-responsive" style="width:60%;height:55%;float: left;" alt="Image">
                           
                              <div style="margin-left: 250px;font-size:16px;"> 
                                 <span>No Data Found</span><br>
                              </div>';
                           }
                           ?>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                        <strong class="card-title">Guard 2</strong>
                     </div>
                     <div class="card-body">
                        <?php
                           if($_SESSION['ok']==1) {
                              $st_id = $_SESSION['username'];
                              $sql = "SELECT * FROM guardians where st_id='$st_id' AND guard_no=2";
                              $res = mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_array($res)){
                                 echo  "<img src='uploads/".$row['image']."'";
                                 echo 'class="img-responsive" style="width:60%;height:55%;float: left;" alt="Image">
                                 <div style="margin-left: 250px;font-size:13px;"> 
                                    <span>Name : '.$row['name'].'</span><br>
                                    <span>Aadhar No : '.$row['aadhar'].'</span><br>
                                    <span>Relation : '.$row['relation'].'</span><br>
                                    <span>Phone No : '.$row['ph'].'</span><br>
                                 </div>';
                              }
                           }
                           else {
                              echo  "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOOigxPC1OtYYo1yJ2tJdBh_a7Nx4c23HUFw0kxZHQHiQ8pT2d'".'class="img-responsive" style="width:60%;height:55%;float: left;" alt="Image">
                           
                              <div style="margin-left: 250px;font-size:16px;"> 
                                 <span>No Data Found</span><br>
                              </div>';
                           }
                           ?>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                        <strong class="card-title">Guard 3</strong>
                     </div>
                     <div class="card-body">
                        <?php
                           if($_SESSION['ok']==1) {
                              $st_id = $_SESSION['username'];
                              $sql = "SELECT * FROM guardians where st_id='$st_id' AND guard_no=3";
                              $res = mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_array($res)){
                                 echo  "<img src='uploads/".$row['image']."'";
                                 echo 'class="img-responsive" style="width:60%;height:55%;float: left;" alt="Image">
                                 <div style="margin-left: 250px;font-size:13px;"> 
                                    <span>Name : '.$row['name'].'</span><br>
                                    <span>Aadhar No : '.$row['aadhar'].'</span><br>
                                    <span>Relation : '.$row['relation'].'</span><br>
                                    <span>Phone No : '.$row['ph'].'</span><br>
                                 </div>';
                              }
                           }
                           else{
                              echo  "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOOigxPC1OtYYo1yJ2tJdBh_a7Nx4c23HUFw0kxZHQHiQ8pT2d'".'class="img-responsive" style="width:60%;height:55%;float: left;" alt="Image">
                           
                              <div style="margin-left: 250px;font-size:16px;"> 
                                 <span>No Data Found</span><br>
                              </div>';
                           }
                           ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- .animated -->
      </div>
      </div>
      <script>
         jQuery(document).ready(function() {
             jQuery(".standardSelect").chosen({
                 disable_search_threshold: 10,
                 no_results_text: "Oops, nothing found!",
                 width: "100%"
             });
         });
         
      </script>
   </body>
</html>
