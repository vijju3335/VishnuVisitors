<?php
	session_start();

	if(isset($_SESSION["username"]))
	{
		echo $_SESSION["username"];
		if($_SESSION['role'] == 'admin')
		{
			header("Refresh:2; url=admin/admin.php");
		}
		elseif($_SESSION['role'] == 'guard')
		{
			header('Refresh:2; url=guard/guard.php');
		}
	}
	else{
		header('Refresh:1; url=Accounts/login.php');
	}
?>