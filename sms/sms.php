<?php
	define("API_KEY",'HapYEM/QwWg-siFgjuLR4nwYmuWY1gcQM7b9vgUZiA');
?>
<!DOCTYPE html>
<html>
<head>
	<title>sms</title>
</head>
<body>
	<div>
		<form action="sms.php" method="POST">
			<input type="text" name="num">
			<input type="submit" name="send" value="send">
		</form>
		<?php
		if(isset($_POST['send'])){
			require('textlocal.class.php');

			$textlocal = new Textlocal(false,false,API_KEY);

			$numbers = array(919491753335);
			$sender = 'TXTLCL';
			$message = 'This is a message';

			try {
			    $result = $textlocal->sendSms($numbers, $message, $sender);
			    echo 'sent';
			} catch (Exception $e) {
			    die('Error: ' . $e->getMessage());
			}
		}
		?>
	</div>
</body>
</html>