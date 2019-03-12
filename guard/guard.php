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
      <title>Vishnu Visitors | Guard Homepage</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <!-- Add custom CSS here -->
      <link href="../css/sb-admin.css" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <style type="text/css">
         .panel-heading {
         padding: 35px 25px 35px 25px;
         }
      </style>
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
               <li class="guestpass"><a href="#"><i class="fa fa-user-tie fa-2x"></i><span>  Guest Pass</span></a></li>
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
                  <li class="active"><i class="icon-file-alt"></i><strong>Dashboard</strong></li>
               </ol>
            </div>
         </div>
         <!-- /.row -->
         <!-- JavaScript -->
         <!-- jQuery library -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
         <div class="row">
            <div class="col-lg-5">
               <div class="panel panel-success">
                  <div class="panel-heading">
                     <div class="row">
                        <div class="col-xs-6">
                           <i class="fa fa-users fa-7x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                           <p class="announcement-heading">
                              <?php 
                                 require_once('../connect.php');
                                 $sql = "SELECT COUNT(*) as cnt FROM `visitor_log` WHERE 1";$res = mysqli_query($conn,$sql);
                                 while ($row=mysqli_fetch_array($res)) {
                                    echo $row['cnt'];
                                 }
                                 ?>
                           </p>
                           <h4 class="announcement-text"><strong>Visitors Log</strong></h4>
                        </div>
                     </div>
                  </div>
                  <a href="visitors_log.php">
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
            <div class="col-lg-5 guestpass" >
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <div class="row">
                        <div class="col-xs-6">
                           <i class="fas fa-user-tie fa-7x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                           <p class="announcement-heading">
                              <?php 
                                 require_once('../connect.php');
                                 $sql = "SELECT COUNT(*) as cnt FROM `visitor_log` WHERE pass_type='guest'";$res = mysqli_query($conn,$sql);
                                 while ($row=mysqli_fetch_array($res)) {
                                    echo $row['cnt'];
                                 }
                                 ?>
                           </p>
                           <h4 class="announcement-text"><strong>Guest Pass</strong></h4>
                        </div>
                     </div>
                  </div>
                  <a href="#">
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
            <div class="col-lg-5">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <div class="row">
                        <div class="col-xs-6">
                           <i class="fas fa-user-friends fa-7x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                           <p class="announcement-heading">
                              <?php 
                                 require_once('../connect.php');
                                 $sql = "SELECT COUNT(*) as cnt FROM `visitor_log` WHERE pass_type='parent'";$res = mysqli_query($conn,$sql);
                                 while ($row=mysqli_fetch_array($res)) {
                                    echo $row['cnt'];
                                 }
                                 ?>
                           </p>
                           <h4 class="announcement-text"><strong>Parents Pass</strong></h4>
                        </div>
                     </div>
                  </div>
                  <a href="verify_visitor.php">
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
            <div class="col-lg-5">
               <div class="panel panel-danger">
                  <div class="panel-heading">
                     <div class="row">
                        <div class="col-xs-6">
                           <i class="fa fa-users fa-7x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                           <p class="announcement-heading">
                              <?php 
                                 require_once('../connect.php');
                                 $sql = "SELECT COUNT(*) as cnt FROM `visitor_log` WHERE out_time='NA'";$res = mysqli_query($conn,$sql);
                                 while ($row=mysqli_fetch_array($res)) {
                                    echo $row['cnt'];
                                 }
                                 ?>
                           </p>
                           <h4 class="announcement-text"><strong>Visitors Inside Campus</strong></h4>
                        </div>
                     </div>
                  </div>
                  <a href="visitors_inside.php">
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
      <!-- Modal: modalQuickView -->
      <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-body">
                  <div class="row">
                     <form action="../gatepass/guestpass.php" method="POST" enctype="multipart/form-data">
                        <div class="col-lg-6">
                           <div id="my_camera" style="margin-top: 20px;">
                           </div>
                           <span id="take">
                           <img src="https://img.icons8.com/nolan/64/000000/google-images.png" width="10%" height="10%" alt="camera icon" style="margin-left: 175px;margin-top: 20px;margin-right: 20px;">
                           </span>
                           <span onClick="retake_snapshot()" id="retake">
                           <img src="https://img.icons8.com/nolan/64/000000/undo.png" width="10%" height="10%" alt="camera icon" style="margin-top: 20px;">
                           </span>
                           <input type="hidden" name="image" class="image-tag" >
                        </div>
                        <div class="col-lg-6">
                           <h2 class="h2-responsive product-name">
                              <img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Vishnu_Universal_Learning.png/220px-Vishnu_Universal_Learning.png" width="13%" height="13%" alt="VITB logo"/><strong>  Vishnu Gate Pass</strong>
                           </h2>
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="guardian">Generate Pass on Name :</label >
                                    <input type="text" class="form-control" name="guardian" id="guardian" value="" pattern="[a-z ]+" title="Only alphabets are allowed." required>
                                 </div>
                                 <div class="form-group">
                                    <label for="vpurpose">Purpose : </label>
                                    <input type="text" class="form-control" name="vpurpose" id="vpurpose" value="" pattern="[a-z ]+" title="Only alphabets are allowed."required>
                                 </div>
                                 <div class="form-group">
                                    <label for="hname">Host Name : </label>
                                    <input type="text" class="form-control" name="hname" id="hname" pattern="[a-z ]+" title="Only alphabets are allowed." required>
                                 </div>
                                 <div class="form-group">
                                    <label for="hid">Host Id : </label>
                                    <input type="text" class="form-control" name="hid" id="hid" pattern="[A-Z0-9]+" title="No special characters are allowed.">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="typ">Proof Type: </label >
                                    <select class="form-control" name="typ" id="typ" required="">
                                       <option value="aadhar">Aadhar</option>
                                       <option value="driving licence">Driving licence</option>
                                       <option value="voter id">Voter Id</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="typ" id='gvt_id'>Govt Id No: </label >
                                    <input type="text" class="form-control" name="gip" id="gip" value="" pattern="[A-Za-z0-9]+" title="No special characters are allowed."required>
                                 </div>
                                 <div class="form-group">
                                    <label for="grp">No of Persons : </label>
                                    <input type="number" class="form-control" name="grp" id="grp" value="" min='1' max='5' pattern="[0-9]" title="Only numbers are allowed." required >
                                 </div>
                                 <div class="form-group">
                                    <label for="vph">Contact No : </label>
                                    <input type="text" class="form-control" name="vph" id="vph" value="" pattern="[0-9]+" title="Only numbers are allowed." minlength="10" maxlength="10" required>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12 form-group" >
                                    <input type="submit" class="btn btn-primary" name='print' id="print" value='Print' style="width: 426px;margin-left: 12px;">
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- Adding plugins webcam.min.js to control webcam -->
      <script type = "text/javascript" src ="../webcam/webcamjs/webcam.min.js"></script>
      <!--JS CODE-->
      <script language = "JavaScript" >
         // loading action when document loaded
         $(document).ready(() => {
         
            var i;
            //hiding retake button
            $('#retake').hide();
            //opening modal
            $('.guestpass').click(()=>{
               $("#modalQuickView").modal('show');
            });
            //dynamically changing prooftype label
            $('#typ').change(()=>{
               var r = ' '+$('#typ').val();
               
               var t =r.replace(/\W+(.)/g, function(match, chr){
                  return chr.toUpperCase();
               });
               $('#gvt_id').text(t+' No:');
            });
            //input filed value to lower
            
            $('#hid,#gip').keyup(function(){
               $(this).val($(this).val().toUpperCase());
            });
            //starting letter of word uppercase
            $("#guardian,#hname").keyup(function () {  
                $('#guardian,#hname').css('textTransform', 'capitalize');  
            }); 
         
            //snap retaking function
            $('#retake').click(()=>  {
               alert("Retake the Image ???");
               Webcam.set({
                  width: 420,
                  height: 320,
                  image_format: 'jpeg',
                  jpeg_quality: 95
               });
               Webcam.attach('#my_camera');
               //hiding retake button
               $('#retake').hide();
               //showing take button
               $('#take').show();
            })
            //setting webcam
            Webcam.set({
               width: 420,
               height: 320,
               image_format: 'jpeg',
               jpeg_quality: 95
            });
            Webcam.attach('#my_camera');
            //preloading shutter audio clip
            var shutter = new Audio();
            shutter.autoplay = false;
            shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : '../webcam/shutter.mp3';
            //to store captured img link
            //take a snapshot
            $('#take').click(()=> {
            //play sound effect
               shutter.play();
            //take snapshot and get image data
               Webcam.snap(function(data_uri) {
                  i = data_uri;
               });Webcam.reset();
            //save to upload
               var base64image = i;
               //var a = '15pa1a0568';
               $(".image-tag").val(i);
         
              // Webcam.upload(base64image, '../webcam/upload.php', function(code, text) {
                //  console.log(i);
               //});
               //displaying captured image
               document.getElementById('my_camera').innerHTML = '<img class="d-block w-100" src="' + i + '" width="100%" height="100%" alt="visitor image" style="margin-top:20px;">';
               $('#take').hide();
               $('#retake').show();
            });
         });
      </script>
   </body>
</html>
