<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require ("../connect.php");
$username = $name = $email = $hostel = $cnt = $branch = $clg = $img = $course = $err = $succ = $otp = '';
if (isset($_POST['submit']) && $_POST['email']) {
    $username = $_POST['usr'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $hostel = $_POST['hostel'];
    $cnt = $_POST['cnt'];
    $branch = $_POST['branch'];
    $course = 'B.Tech';
    $res = mysqli_query($conn, "SELECT * FROM `students` where email = '$email' or username = '$username'");
    if ($res->num_rows == 0) {
        $row = mysqli_fetch_assoc($res);
        $otp = rand(100000, 999999);
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = '15pa1a0568@vishnu.edu.in'; // SMTP username
            $mail->Password = 'Vijju@3335'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = '465'; // TCP port to connect to
            //Recipients
            $mail->setFrom('vijju@gmail.com', 'Mail Alert');
            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Password Reset';
            $mail->Body = 'Hi ' . $username . ' use this OTP ' . $otp . ' to reset your account password.';
            $mail->AddAddress($email);
            $mail->send();
            $err = 'Please check the mail : ' . $email . ' for OTP.';
            
            $uploadOk = 1;
                $img = $_FILES['image']['name'];
                $target = "../guard/uploads/" . basename($img);
                $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check == false) {
                    $err = "File is not an image.";
                    $uploadOk = 0;
                }
                // Check if file already exists
                if (file_exists($target)) {
                    $err = "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["image"]["size"] > 1500000) {
                    $err = 'Sorry, your file is too large.';
                    $err = $_FILES["image"]["size"] / 1000000 . 'MB<br>';
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $err = "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    
                } else {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        $suc = "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                    } else {
                        $err = "Sorry, there was an error uploading your file.";
                    }
                }
            
            $sql = "INSERT INTO `students` (`name`, `username`, `ph`, `email`, `college`, `branch`, `course`, `image`, `hostel`, `otp`) VALUES ('$name', '$username','$cnt', '$email', 'VIT', '$branch', '$course', '$img', '$hostel', '$otp')";
            if (mysqli_query($conn, $sql)) {
                $username = $name = $email = $hostel = $cnt = $branch = $clg = $img = $course = $succ = $otp = '';
                header("Refresh:3; url=verify.php");
            } else {
                $err = "<li>Failed to Resgister.</li>";
            }
        }
        catch(Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    } else {
        //$err = "Incorrect Email Address!";
        $email = '';
        $err = "<li>Student already exists.</li>";
        header("Refresh:3; url=register.php");
    }
}
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="shortcut icon" href="http://vishnu.edu.in/upload_news/newlogo.bmp" type="image/x-icon">
      <title>Adding Members</title>
      <style>
         #sg{
         width:35%;
         }
      </style>
   </head>
   <body>
      <nav class="navbar style="margin-left:130px;margin-top:50px;">
      <div class="navbar-header">
         <a class="navbar-brand vl" href="#"> 
         <img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Vishnu_Universal_Learning.png/220px-Vishnu_Universal_Learning.png" height="210" width="210" alt="vishnu_logo" style="margin-left:80px;margin-top:25px;">
         </a>
      </div>
      </nav>
      <div id ="sg" class="container">
         <div class="row" style="margin-top: -25px;">
            <div class="col-sm-12 form-group-sm">
               <h3 style="margin-top: 0px;">Add Members</h3>
               <?php
                    if ($err != '') {
                        echo '<div class="alert alert-warning">';
                        echo $err;
                        echo '</div>';
                    } elseif ($succ != '') {
                        echo '<div class="alert alert-success">';
                        echo $succ;
                        echo '</div>';
                    }
                ?>
               <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  <div class="form-group">
                     <label for="name">Name :</label>
                     <input type="text" class="form-control" name="name" id="name" value="" required>
                  </div>
                  <div class="form-group">
                     <label for="usr">Reg No :</label>
                     <input type="text" class="form-control" name="usr" id="usr" value="" required>
                  </div>
                  <div class="form-group">
                     <label for="email">Email :</label>
                     <input type="email" class="form-control" name="email" id="email" value="" required>
                  </div>
                  <div class="form-group">
                     <label for="course">Select Course:</label >
                     <select class="form-control" name="course" id="course" disabled>
                        <option>B.Tech</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="branch">Select Branch:</label >
                     <select class="form-control" name="branch" id="branch" >
                        <option>CSE</option>
                        <option>ECE</option>
                        <option>IT</option>
                        <option>EEE</option>
                        <option>MECH</option>
                        <option>CIV</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="hostel">Hostel Name:</label>
                     <input type="text" class="form-control" name="hostel" id="hostel" value="" required>
                  </div>
                  <div class="form-group">
                     <label for="img">Image :</label>
                     <input type="file" class="form-control" name="image" id="img"  accept="image/*">
                  </div>
                  <div class="form-group">
                     <label for="cnt">Contact No:</label>
                     <input type="text" class="form-control" name="cnt" id="cnt" value="" pattern="[0-9]{10}" title="must contains only numbers with length 10 ex: 9876543210" required>
                  </div>
                  <div class="form-group">
                     <input class="btn btn-primary" type="submit" name="submit" value="Add Member">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>