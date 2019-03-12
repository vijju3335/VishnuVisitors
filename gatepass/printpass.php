<?php 
   require_once('../connect.php'); 
   session_start();
   $err=$id=$vname=$img=$vpurpose=$vph=$hid=$passtype=$count=$date=$in='';
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
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Vishnu_Universal_Learning.png/220px-Vishnu_Universal_Learning.png" type="image/x-icon">
      <title>Printing Gate Pass</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   </head>
   <body style="width: 510px;">
      <?php
         if($err!=''){
             echo '<div class="alert alert-warning">';
             echo $err;
             echo '</div>';
         }
         ?>   
      <div class="container" style="margin-left: 85px;">
         <div style="margin-left: 150px;margin-top: 100px;">
            <img src="http://vishnu.edu.in/images/logo_red.png" width="240px" height="40px" alt="vit logo">
            <p style="font-size: 12px;color: #999999;font-style: italic; margin-bottom: 0px;margin-left: -5px;"><b>Sri Vishnu Educational Society, Bhimavaram</b></p>
         </div>
         <h5 style="text-align: center;padding-top: 8px;padding-bottom: 8px;"><b><?php echo $passtype;?> PASS</b></h5>
         <div class="container">
            <div class="row">
               <div class="col-sm-7" style="padding-left: 90px;padding-right: 0;">
                  <span>Pass Id: <?php echo '<b>'.$id.'</b>';?></span><br>
                  <span>Name: <?php echo '<b>'.$vname.'</b>';?></span><br>
                  <span>No of Persons: <?php echo '<b>'.$count.'</b>';?></span><br>
                  <span>Purpose: <?php echo '<b>'.$vpurpose.'</b>';?></span><br>
                  <span>Host Id: <?php echo '<b>'.$hid.'</b>';?></span><br>
                  <span>Host Name: <?php echo '<b>'.$hname.'</b>';?></span><br>
                  <span style="font-size: 26px;padding-left: 10px;"><b><?php echo $date;?></b></span>
               </div>
               <div class="col-sm-5" style="padding-left: 0">
                  <img style="border-radius:10px;" <?php echo 'src="upload/'.$img.'"';?> width="180px" height="150px">
                  <span style="font-size: 25px;padding-top: 10px;"><b><?php echo $in;?></b></span>
               </div>
            </div>
            <div class="row" style="padding-left: 76px;padding-right: 0;font-size: 10px;padding-top: 8px;">
               <div class="col-sm-12">
                  <span><b>Note:</b></span>
                  <span>1. After 7:00 PM, No visitor is allowed to be inside the campus.</span><br>
                  <span>2. Incase of emergency please call to Tollfree number <b>100</b>.<span><br>
                  <span>3. Quote for the day <b>'LIVE GREEN | GO GREEN'<b>.<span>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         $(document).ready(()=>{
           var i = $('h5').text().toUpperCase();
           $('h5').text(i);
         })
      </script>
   </body>
</html>
