<?php
   session_start();
   if(isset($_SESSION["username"])){
       header('Location: navigate.php');
   }
   ?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="shortcut icon" href="http://vishnu.edu.in/upload_news/newlogo.bmp" type="image/x-icon">
      <title>Vishnu Visitors Gate Pass</title>
      <style>
         body, html {
         height: 100%;
         }
         .bg { 
         /* The image used */
         background-image: url("gate.jpg");
         /* Full height */
         height: 100%; 
         /* Center and scale the image nicely */
         background-position: center;
         background-repeat: no-repeat;
         background-size: cover;
         }
      </style>
   </head>
   <body class="bg">
      <nav class="navbar ">
         <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
               <li><a href="/Vishnu Visitors/Accounts/login.php"><span class="glyphicon glyphicon-log-in"></span> <b>Login</b></a></li>
            </ul>
         </div>
      </nav>
   </body>
</html>
