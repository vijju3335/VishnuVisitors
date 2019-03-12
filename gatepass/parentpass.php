<?php
   session_start();
   $p=0;
    require("../connect.php");
    $err=$msg=$vname=$img=$vpurpose=$vph=$hname=$hid=$typ=$gip=$grp=$date=$in=$out="";
    if (isset($_POST['print'])) {
       $vname = $_POST['guardian'];
       $vpurpose = $_POST['vpurpose'];
       $img = $_POST['image'];
       $hname = $_POST['hname'];
       $hid = $_POST['hid'];
       $typ = $_POST['typ'];
       $gip = $_POST['gip'];
       $grp = $_POST['grp'];
       $vph = $_POST['vph'];
       $date = date('d-m-Y');
       $in = date('h:i A');
       $out = 'NA'
       $passtype = 'parent'; 
       //Image retrieveing
       $folderPath = "upload/parents/";
   
     $image_parts = explode(";base64,", $img);
     $image_type_aux = explode("image/", $image_parts[0]);
     $image_type = $image_type_aux[1];
   
     $image_base64 = base64_decode($image_parts[1]);
     $fileName = date('Ymd').$hid.'.png';
   
     $file = $folderPath . $fileName;
     file_put_contents($file, $image_base64);
     //image rename
     $img = $fileName;
   
       $sql = "INSERT INTO `visitor_log` (`id`, `visitor_name`, `visitor_ph`, `pass_type`, `visitor_image`, `visitors_count`, `host_name`, `host_id`, `proof_type`, `proof_no`, `visitor_purpose`, `date`, `in_time`, `out_time`) VALUES (NULL, '$vname', '$vph', '$passtype', '$img', '$grp', '$hname', '$hid', '$typ', '$gip', '$vpurpose', '$date', '$in', '$out')";
      if($res = mysqli_query($conn,$sql)){
         $msg = "Printing the Gate Pass";
         setcookie('pno',$gip);
         setcookie('dt',$date);
         setcookie('in',$in);
      }else{
       $err = "Issuing Pass Failed";
      }
    }
    if(isset($_POST['vph']) and isset($_POST['print']) and $p==1){
       require('../sms/textlocal.class.php');
       $textlocal = new Textlocal(false,false,'HapYEM/QwWg-siFgjuLR4nwYmuWY1gcQM7b9vgUZiA');
       $numbers = array('91'.$_POST['vph']);
       $sender = 'TXTLCL';
       $message = 'This is a testing message';
   
       try {
           $result = $textlocal->sendSms($numbers, $message, $sender);
       } catch (Exception $e) {
           $err = 'Error: '.$e->getMessage();
           die('Error: ' . $e->getMessage());
       }
     }
     if(isset($_COOKIE['pno'])){
        $gip = $_COOKIE['pno'];
        $date = $_COOKIE['dt'];
        $in = $_COOKIE['in'];
        $sql= "SELECT * FROM `visitor_log` WHERE date='$date' and in_time='$in' and proof_no='$gip'";
        $res = mysqli_query($conn,$sql);
        if(!$res){
          $err='failed to fetch data.';
        }
        while ($row = mysqli_fetch_array($res)) {
          $id=$row['id'];
          $vname=$row['visitor_name'];
          $img=$row['visitor_image'];
          $vpurpose=$row['visitor_purpose'];
          $hid=$row['host_id'];
          $hname=$row['host_name'];
          $passtype=$row['pass_type'];
          $count=$row['visitors_count'];
          $date=$row['date'];$in=$row['in_time'];
        }
     }
    ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="college automation project">
      <meta name="author" content="3335">
      <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Vishnu_Universal_Learning.png/220px-Vishnu_Universal_Learning.png" type="image/x-icon">
      <title>Vishnu Visitors | Parents Pass Printing Page</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
                  <li><a href="../guard/guard.php"><i class="fa fa-home fa-2x"></i><span>  Dashboard</span></a></li>
                  <li><a href="../guard/visitor_log.php"><i class="fa  fa-users fa-2x"></i><span>  Visitors Log</span></a></li>
                  <li><a href="../guard/guard.php"><i class="fa fa-user-tie fa-2x"></i><span>  Guest Pass</span></a></li>
                  <li><a href="../guard/verify_visitor.php"><i class="fa fa-user-friends fa-2x"></i><span>  Parents Pass</span></a></li>
                  <li><a href="../guard/visitors_inside.php"><i class="fa fa-users fa-2x"></i><span>  Visitors Inside</span></a></li>
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
                     <li><a href="../guard/guard.php" style="text-decoration: none;"><i class="icon-dashboard"></i><strong>VVMS</strong></a></li>
                     <li><i class="icon-file-alt"></i><a href="../guard/guard.php" style="text-decoration: none;"><strong>Dashboard</strong></a></li>
                     <li class="active"><i class="icon-file-alt"></i><strong>Guest Pass</strong></li>
                  </ol>
               </div>
            </div>
            <?php
               if($msg!=''){
                   echo '<div class="alert alert-success">';
                   echo $msg;
                   echo '</div>';
               }
               else if($err!=''){
                   echo '<div class="alert alert-warning">';
                   echo $msg;
                   echo '</div>';
               }
               ?> 
            <div style="width: 380px;border: 2px solid orange;margin-left: 250px;">
               <div class="container" style="width: 380px;">
                  <div style="margin-top: 10px;margin-left: 40px;">
                     <img src="http://vishnu.edu.in/images/logo_red.png" width="240px" height="40px" alt="vit logo" style="padding-left: 20px;">
                     <p style="font-size: 12px;color: #999999;font-style: italic; margin-bottom: 0px;"><b>Sri Vishnu Educational Society, Bhimavaram</b></p>
                  </div>
                  <h5 style="text-align:center;font-weight: bold;"><?php echo $passtype;?> PASS</h5>
                  <div class="container" style="width: 380px;">
                     <div class="row">
                        <div class="col-sm-7" style="padding-left: 15px;padding-right: 0;width: 180px;">
                           <span>Pass Id: <?php echo '<b>'.$id.'</b>';?></span><br>
                           <span>Name: <?php echo '<b>'.$vname.'</b>';?></span><br>
                           <span>No of Persons: <?php echo '<b>'.$count.'</b>';?></span><br>
                           <span>Purpose: <?php echo '<b>'.$vpurpose.'</b>';?></span><br>
                           <span>Host Id: <?php echo '<b>'.$hid.'</b>';?></span><br>
                           <span>Host Name: <?php echo '<b>'.$hname.'</b>';?></span><br>
                           <span style="font-size: 26px;"><b><?php echo $date;?></b></span>
                        </div>
                        <div class="col-sm-5" style="padding-left: 0;">
                           <img style="border-radius:10px;margin-bottom: 10px;" <?php echo 'src="upload/parents/'.$img.'"';?> width="160px" height="120px">
                           <span style="font-size: 26px;padding-top: 10px;"><b><?php echo $in;?></b></span>
                        </div>
                     </div>
                     <div class="row" style="font-size: 10px;padding-top: 8px;">
                        <div class="col-sm-12">
                           <span><b>Note:</b></span>
                           <span>1. After 7:00 PM, No visitor is allowed to be inside the campus.</span><br>
                           <span>2. Incase of emergency please call to Tollfree number <b>100</b>.<span><br>
                           <span>3. Quote for the day <b>'LIVE GREEN | GO GREEN'<b>.<span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /.row -->
      <!-- JavaScript -->
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <script type="text/javascript">
         $(document).ready(()=>{
           var i = $('h5').text().toUpperCase();
           $('h5').text(i);
         })
      </script>
   </body>
</html>
