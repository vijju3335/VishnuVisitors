<?php
    require("../connect.php");
    session_start();
    if(isset($_SESSION["username"])){
        header('Location: ../navigate.php');
    }
    $email='';
    $err='';
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $pswd=$_POST['pwd'];
        $pswd1= sha1($pswd);
        $sql = "SELECT * FROM `users` where email = '$email' or username ='$email' AND password = '$pswd1'";
        $res = mysqli_query($conn,$sql);
        if ($res->num_rows > 0) {
            $row = mysqli_fetch_assoc($res);

                $_SESSION["username"]=$row['username'];
                $_SESSION["role"]=$row['role'];
                $_SESSION["uid"]=$row['id'];
                header('Location: ../navigate.php');
            
        }
        else{
            $err = "Email/password incorrect";
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
    <title>Login 4 Vishnu Visitors</title>
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
            <h2>Login</h2><br>
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
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" required>
                </div>
                <div class="form-group">
                    <span>forgot your password?<a style="text-decoration:none;" href="forgot.php"> click here</a></span>
                    <input class="btn btn-primary" style="float:right" type="submit" name="submit" value="Login"><br>
                    <span>New Student ?<a style="text-decoration:none;" href="register.php"> click here</a></span>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>