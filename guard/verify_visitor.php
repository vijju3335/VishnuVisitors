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
      <title>Vishnu Visitors | Verifying page</title>
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
                     <li class="active"><i class="icon-file-alt"></i><strong>Parents Pass</strong></li>
                  </ol>
               </div>
            </div>
            <!-- /.row -->
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-xs-offset-2">
                     <div class="input-group">
                        <div class="input-group-btn search-panel">
                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                           <span id="search_concept">Filter by</span> <span class="caret"></span>
                           </button>
                           <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Host Id</a></li>
                           </ul>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">         
                        <input type="text" class="form-control" name="x" id ="rollno" placeholder="Search term...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" id ="searchStud" type="button"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="row">
                 <div class="col col-lg-5" style="border: 1.5px solid lightblue;margin-top: 18px;margin-right: 25px;">
                    <div>
                      <img src="https://www.hindisoch.com/wp-content/uploads/2017/04/Jay-Hanuman-HD-Wallpapers.jpg" class="img-rounded" width="100%" height="100%" style="margin-top: 10px;">
                    </div>
                    <div class="row">
                      <div class="col col-lg-6">
                        Name: <label><span>Hanuman</span></label><br>
                        Name: <label><span>Hanuman</span></label><br>
                        Name: <label><span>Hanuman</span></label><br>  
                      </div>
                      <div class="col col-lg-6" style="margin-top: 20px;">
                        <button class="btn btn-default">Generate pass</button>
                      </div>
                    </div>
                 </div>
                 <div class="col col-lg-5" style="border: 1.5px solid lightblue;margin-top: 18px;margin-right: 25px;">
                    <div>
                      <img src="https://www.hindisoch.com/wp-content/uploads/2017/04/Jay-Hanuman-HD-Wallpapers.jpg" class="img-rounded" width="100%" height="100%" style="margin-top: 10px;">
                    </div>
                    <div>
                      <span>Name: Hanuman</span><br>
                      <span>Name: Hanuman</span><br>
                      <button class="btn btn-default">Generate pass</button>
                    </div>
                 </div>
                 <div class="col col-lg-5" style="border: 1.5px solid lightblue;margin-top: 18px;margin-right: 25px;">
                    <div>
                      <img src="https://www.hindisoch.com/wp-content/uploads/2017/04/Jay-Hanuman-HD-Wallpapers.jpg" class="img-rounded" width="100%" height="100%" style="margin-top: 10px;">
                    </div>
                    <div>
                      <span>Name: Hanuman</span><br>
                      <span>Name: Hanuman</span><br>
                      <button class="btn btn-default">Generate pass</button>
                    </div>
                 </div>
                 <div class="col col-lg-5" style="border: 1.5px solid lightblue;margin-top: 18px;margin-right: 25px;">
                    <div>
                      <img src="https://www.hindisoch.com/wp-content/uploads/2017/04/Jay-Hanuman-HD-Wallpapers.jpg" class="img-rounded" width="100%" height="100%" style="margin-top: 10px;">
                    </div>
                    <div>
                      <span>Name: Hanuman</span><br>
                      <span>Name: Hanuman</span><br>
                      <button class="btn btn-default">Generate pass</button>
                    </div>
                 </div>
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
         <!-- JavaScript -->
         <!-- jQuery library -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      </div>
      <script type="text/javascript">
         $(document).ready(function(e){
             $('.search-panel .dropdown-menu').find('a').click(function(e) {
               e.preventDefault();
               var param = $(this).attr("href").replace("#","");
               var concept = $(this).text();
               $('.search-panel span#search_concept').text(concept);
               $('.input-group #search_param').val(param);
            });
             $('#rollno').keyup(function(){
               $(this).val($(this).val().toUpperCase());
            });
            $('#searchStud').click(()=>{
               var id= $('#rollno').val();
               id = id.toLowerCase();
               console.log(id);
               if(id){
                  $.ajax({
                      url: "https://guarded-shore-72841.herokuapp.com/other/getstudentdata", 
                      data: {'rollno':id},
                      type: 'post',
                      error: function(XMLHttpRequest, textStatus, errorThrown){
                          alert('status:' + XMLHttpRequest.status + ', status text: ' + XMLHttpRequest.statusText);
                      },
                      success: function(data){
                        console.log(data);
                        }
                  });
               }
               else{
                     alert("Search field should not be empty");
               }
            })
         });
      </script>
      <!-- Modal: modalQuickView -->
      <!--MODAL CODE-->
      <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-6">
                        <div id="my_camera" class="img-rounded" style="margin-top: 20px;">
                        </div>
                        <span onClick="take_snapshot()" id="take">
                        <img src="https://img.icons8.com/nolan/64/000000/google-images.png" width="10%" height="10%" alt="camera icon" style="margin-left: 175px;margin-top: 20px;margin-right: 20px;">
                        </span>
                        <span onClick="retake_snapshot()" id="retake">
                        <img src="https://img.icons8.com/nolan/64/000000/undo.png" width="10%" height="10%" alt="camera icon" style="margin-top: 20px;">
                        </span>
                     </div>
                     <div class="col-lg-6">
                        <h2 class="h2-responsive product-name">
                           <img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Vishnu_Universal_Learning.png/220px-Vishnu_Universal_Learning.png" width="13%" height="13%" alt="VITB logo"/><strong>  Vishnu Gate Pass</strong>
                        </h2>
                        <div class="row">
                           <form action="#" method="POST" enctype="multipart/form-data">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="guardian">Generate Pass on Name :</label >
                                    <select class="form-control" name="guardian" id="guardian" value=''>
                                       <option>select main guardian</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="vpurpose">Purpose : </label>
                                    <input type="text" class="form-control" name="vpurpose" id="vpurpose" value="" required>
                                 </div>
                                 <div class="form-group">
                                    <label for="hname">Host Name : </label>
                                    <input type="text" class="form-control" name="hname" id="hname" disabled >
                                 </div>
                                 <div class="form-group">
                                    <label for="hid">Host Id : </label>
                                    <input type="text" class="form-control" name="hid" id="hid" disabled >
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
                                    <input type="text" class="form-control" name="gip" id="gip" value="" required>
                                 </div>
                                 <div class="form-group">
                                    <label for="grp">No of Persons : </label>
                                    <input type="text" class="form-control" name="grp" id="grp" value="" required>
                                 </div>
                                 <div class="form-group">
                                    <label for="vph">Contact No : </label>
                                    <input type="text" class="form-control" name="vph" id="vph" value="" required>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12 form-group" >
                                    <input type="submit" class="btn btn-primary" name='print' id="print" value='Print' style="width: 426px;margin-left: 12px;">
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--JS CODE-->
      <script type = "text/javascript"
         src = "../webcam/webcamjs/webcam.min.js" ></script>
      <!-- Configure a few settings and attach camera -->
      <script language = "JavaScript" >
         function retake_snapshot() {
           alert("Retake the Image ???");
           Webcam.set({
            width: 420,
            height: 320,
            image_format: 'jpeg',
            jpeg_quality: 95
           });
           Webcam.attach('#my_camera');
           $('#retake').hide();
           $('#take').show();
         }
         
         Webcam.set({
          width: 420,
          height: 320,
          image_format: 'jpeg',
          jpeg_quality: 95
         });Webcam.attach('#my_camera');
         
         // preload shutter audio clip
         var shutter = new Audio();
         shutter.autoplay = false;
         shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : '../webcam/shutter.mp3';
         
         function take_snapshot() {
          var i;
          // play sound effect
          shutter.play();
          // take snapshot and get image data
          Webcam.snap(function(data_uri) {
           i = data_uri;
          });
          Webcam.reset();
          // save to uploads
          var base64image = i;
          //Webcam.upload(base64image, '../webcam/upload.php', function(code, text) {
           //console.log('Save successfully');
          //});
         
          document.getElementById('my_camera').innerHTML =
           '<img class="d-block w-100" src="' + i + '" width="100%" height="100%" alt="visitor image" style="margin-top:20px;">';
           $('#take').hide();
           $('#retake').show();
         }
         
      </script> 
      <script type = "text/javascript" >
         $(document).ready(() => {
           $('#retake').hide();
           //modal action
           $('#std,#g1,#g2,#g3').click(()=>{
               $("#modalQuickView").modal('show');
           })
           var g = [];
         
           $('#std,#g1,#g2,#g3').click(()=>{
             $.post('http://localhost:3000', (data) => {
               g =data.guardians;
             //visitor name handling
             for (i = 0; i < data.guardians.length; i++) {
               $('#guardian').append(
                   $('<option></option>').val(data.guardians[i].name+':'+i).html(data.guardians[i].name)
                 );
             }
         
             $('#hid').val(data.student.rollno);
             $('#hname').val(data.student.fullname);
            })
           })
           $('#guardian').change(()=>{
             var i = $('#guardian').val().split(':')[1];
             $('#vph').val(g[i].phone);
           })
           $('#typ').change(()=>{
             var i = ' '+$('#typ').val();
         
              var t =i.replace(/\W+(.)/g, function(match, chr)
              {
                   return chr.toUpperCase();
               });
             $('#gvt_id').text(t+' No:');
           })
         }) 
      </script>
   </body>
</html>
