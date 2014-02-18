<?php
    include 'common.php';
    session_start();
    $uname=$_SESSION['uname'];
    $type=$_SESSION['type'];
if (isset($_FILES["avatar"]["name"]) && $_FILES["avatar"]["tmp_name"] != ""){
    if($type=="users"){
	$fileName = $_FILES["avatar"]["name"];
        $fileTmpLoc = $_FILES["avatar"]["tmp_name"];
	$fileType = $_FILES["avatar"]["type"];
	$fileSize = $_FILES["avatar"]["size"];
	$fileErrorMsg = $_FILES["avatar"]["error"];
	$kaboom = explode(".", $fileName);
	$fileExt = end($kaboom);
	list($width, $height) = getimagesize($fileTmpLoc);
	if($width < 10 || $height < 10){
                echo "<script type='text/javascript'>alert('That image has no dimensions');</script>";
		?><script type="text/javascript">response.sendRedirect("members.php");</script><?php
        exit();	
	}
	$db_file_name = rand(100000000000,999999999999).".".$fileExt;
	if($fileSize > 1048576) {
                echo "<script type='text/javascript'>alert('Your image file was larger than 1mb');</script>";
		?><script type="text/javascript">response.sendRedirect("members.php");</script><?php
        exit();	
	} else if (!preg_match("/\.(gif|jpg|png)$/i", $fileName) ) {
                echo "<script type='text/javascript'>alert('Your image file was not jpg, gif or png type');</script>";
		?><script type="text/javascript">response.sendRedirect("members.php");</script><?php
        exit();
	} else if ($fileErrorMsg == 1) {
                 echo "<script type='text/javascript'>alert('An unknown error occurred');</script>";
		?><script type="text/javascript">response.sendRedirect("members.php");</script><?php
        exit();
	}
	$sql = "SELECT avatar FROM users WHERE username='$uname' LIMIT 1";
	$query = mysql_query($sql,connect());
	$row = mysql_fetch_row($query);
	$avatar = $row[0];
	if($avatar != ""){
		$picurl = "users/$uname/$avatar"; 
	    if (file_exists($picurl)) { unlink($picurl); }
	}
	$moveResult = move_uploaded_file($fileTmpLoc, "users/$uname/$db_file_name");
	if ($moveResult != true) {
                echo "<script type='text/javascript'>alert('File upload faile');</script>";
		?><script type="text/javascript">response.sendRedirect("members.php");</script><?php
        exit();
	}
	include_once("image_resize.php");
	$target_file = "users/$uname/$db_file_name";
	$resized_file = "users/$uname/$db_file_name";
	$wmax = 200;
	$hmax = 300;
	img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
	$sql = "UPDATE users SET avatar='$db_file_name' WHERE username='$uname' LIMIT 1";
	$query = mysql_query($sql,connect());
	header("location: members.php");
	exit();
    }
    else{
        $fileName = $_FILES["avatar"]["name"];
        $fileTmpLoc = $_FILES["avatar"]["tmp_name"];
	$fileType = $_FILES["avatar"]["type"];
	$fileSize = $_FILES["avatar"]["size"];
	$fileErrorMsg = $_FILES["avatar"]["error"];
	$kaboom = explode(".", $fileName);
	$fileExt = end($kaboom);
	list($width, $height) = getimagesize($fileTmpLoc);
	if($width < 10 || $height < 10){
                echo "<script type='text/javascript'>alert('That image has no dimensions');</script>";
		?><script type="text/javascript">response.sendRedirect("members.php");</script><?php
        exit();	
	}
	$db_file_name = rand(100000000000,999999999999).".".$fileExt;
	if($fileSize > 1048576) {
                echo "<script type='text/javascript'>alert('Your image file was larger than 1mb');</script>";
		?><script type="text/javascript">response.sendRedirect("members.php");</script><?php
        exit();	
	} else if (!preg_match("/\.(gif|jpg|png)$/i", $fileName) ) {
                echo "<script type='text/javascript'>alert('Your image file was not jpg, gif or png type');</script>";
		?><script type="text/javascript">response.sendRedirect("members.php");</script><?php
        exit();
	} else if ($fileErrorMsg == 1) {
                 echo "<script type='text/javascript'>alert('An unknown error occurred');</script>";
		?><script type="text/javascript">response.sendRedirect("members.php");</script><?php
        exit();
	}
	$sql = "SELECT avatar FROM mentors WHERE username='$uname' LIMIT 1";
	$query = mysql_query($sql,connect());
	$row = mysql_fetch_row($query);
	$avatar = $row[0];
	if($avatar != ""){
		$picurl = "mentors/$uname/$avatar"; 
	    if (file_exists($picurl)) { unlink($picurl); }
	}
	$moveResult = move_uploaded_file($fileTmpLoc, "mentors/$uname/$db_file_name");
	if ($moveResult != true) {
                echo "<script type='text/javascript'>alert('File upload faile');</script>";
		?><script type="text/javascript">response.sendRedirect("members.php");</script><?php
        exit();
	}
	include_once("image_resize.php");
	$target_file = "mentors/$uname/$db_file_name";
	$resized_file = "mentors/$uname/$db_file_name";
	$wmax = 200;
	$hmax = 300;
	img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
	$sql = "UPDATE mentors SET avatar='$db_file_name' WHERE username='$uname' LIMIT 1";
	$query = mysql_query($sql,connect());
	header("location: members.php");
	exit();
    }
}
?>