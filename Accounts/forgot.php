<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    require("../connect.php");
    session_start();
    
    $email='';
    $err='';
    if(isset($_POST['send']) && $_POST['email']){
        $email=$_POST['email'];
        
        $sql = "SELECT * FROM `users` where email = '$email' ";
        $res = mysqli_query($conn,$sql);
        if ($res->num_rows > 0) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION["email"]=$row['email'];
            $_SESSION["username"]=$row['username'];
            $_SESSION["otp"]= rand(100000,999999);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = '15pa1a0568@vishnu.edu.in';                 // SMTP username
                $mail->Password = 'Vijju@3335';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = '465';                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('vijju@gmail.com','Mail Alert');

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Password Reset';
                $mail->Body    = 'Hi '.$_SESSION['username']. ' use this OTP '.$_SESSION['otp'].' to reset your account password.';
                $mail->AddAddress($_SESSION['email']);

                $mail->send();
                $err = 'Please check the mail : '.$_SESSION['email']. ' for OTP.';

                $email='';
                header("Refresh:3; url=reset.php");
            }
            catch (Exception $e){
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
        else{
            $err = "Incorrect Email Address!";
            $email='';

        }
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
    <title>Change Password</title>
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
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" 
                        value="<?php echo $email;?>" required>
                </div>

                
                <div class="form-group">
                    <input class="btn btn-primary" style="float:right" type="submit" name="send" value="send OTP">
                </div>

            </form>
        </div>
    </div>
</div>

</body>

</html>