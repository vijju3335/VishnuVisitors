<?php
// new filename
$filename = 'IMG_'.date('Ymd') . '.jpeg';

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'../guard/upload/'.$filename) ){
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '../guard/upload/' . $filename;
}

// Return image url
echo $url;
?>