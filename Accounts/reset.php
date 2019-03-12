<?php
  require("../connect.php");
  session_start();

  $err=$suc='';
    if(isset($_POST['update'])){
        $email = $_SESSION['email'];
        $pswd= sha1($_POST['new_password']);
        
        $sql = "UPDATE `users` SET password = '$pswd' where email = '$email'";
        $res = mysqli_query($conn,$sql);
        if($res){
            $suc = "Password has Changed Successfully.";
            header("Refresh:3; url=login.php");
        }
        else{
            $err = "Failed to Change Password. Try again.";
            header("Refresh:3; url=forgot.php");
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
    <title>Verifying OTP</title>
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
                <a class="navbar-brand vl" href="#"> 
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
                        echo '<div class="alert alert-warning">';
                        echo $suc;
                        echo '</div>';
                    }
	            ?>
	            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	                <div class="form-group">
	                    <label for="otp" id='l'>OTP : </label>
	                    <input type="number" id="otp" class="form-control" name="otp" min="100000" max="999999">
	                </div>
	                
	                <div class="form-group">
	                    <input class="btn btn-primary" id='smt' style="float:right" type="submit" name="verify" value="Verify">
	                </div>
                    <br><br><br>
                    <?php
                        if(isset($_POST['verify'])){
                            if($_POST['otp']==$_SESSION['otp']){
                                echo '<div class="form-group">
                                        <label for="new">New Password : </label>
                                        <input type="password" id="new" class="form-control" name="new_password" >
                                    </div>
                    
                                    <div class="form-group">
                                        <input class="btn btn-primary" style="float:right" type="submit" name="update" value="Update Password">
                                    </div>';
                            }
                            else{
                                $err = "Please enter the correct OTP.";
                            }
                        }

                    ?>

	            </form>
	        </div>
	    </div>
	</div>
<script type="text/javascript">
    $('#smt').click(()=>{
        $('#smt').hide();
    })
</script>
</body>

</html>