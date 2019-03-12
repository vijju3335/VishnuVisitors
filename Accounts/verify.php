<?php
  require("../connect.php");

  $err='';
  $suc='';
    if(isset($_POST['verify'])){
        $email = $_POST['email'];
        $row=mysqli_fetch_array(mysqli_query($conn,"SELECT otp FROM `students` WHERE email='$email'"));
        if($row['otp']==$_POST['otp']){
            $sql = "UPDATE `students` SET isVerified = 1 where email = '$email'";
            $res = mysqli_query($conn,$sql);
            if($res){
                $suc = "Successfully Verified and Registered .";

                header("Refresh:4; url=../index.php");
            }
            else{
                $err = "Plz enter correct OTP and get email verified.";
                header("Refresh:3; url=verify.php");
            }
        }
        else{
            $err= "out";
        }
    }
 ?>



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
    <title>Verifying Email</title>
    <style>
        #lg,.vl{
            width:35%;
        }
        
        </style>
</head>

<body>
    <nav class="navbar ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand vl" href="../index.php"> 
                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Vishnu_Universal_Learning.png/220px-Vishnu_Universal_Learning.png" height="210" width="210" alt="vishnu_logo" style="margin-left:130px;margin-top:50px;">
                </a>
            </div>
        </div>
    </nav>
    <div id="lg" class="container">
	    <div class="row">
	        <div class="col-sm-12 form-group-sm">
	            
	            <?php
	                if($err!=''){
	                    echo '<div class="alert alert-warning">';
	                    echo $err;
	                    echo '</div>';
	                }
                    if($suc!=''){
                        echo '<div class="alert alert-success">';
                        echo $suc;
                        echo '</div>';
                    }
	            ?>
	            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	                <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" id="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
	                    <label for="otp">OTP : </label>
	                    <input type="number" id="otp" class="form-control" name="otp" min="100000" max="999999">
	                </div>
	                
	                <div class="form-group">
	                    <input class="btn btn-primary" style="float:right" type="submit" name="verify" value="Verify">
	                </div>
	            </form>
	        </div>
	    </div>
	</div>

</body>

</html>