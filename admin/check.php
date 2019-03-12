<?php
    require("../connect.php");
    session_start();
    if(isset($_SESSION['username'])){
        if($_SESSION["role"] != 'admin'){

            header('Location: ../navigate.php');
        }
    }
    else{
        header('Location: ../accounts/login.php');
    }
?>