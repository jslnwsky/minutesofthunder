<?php
session_start();
include ("./config_database.php");
include ("./config_settings.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$remember = $_POST['remember'];

	$password_hash = sha1($password);

$query = "SELECT username, password FROM adlog_users WHERE username='$username' AND password='$password_hash'";
$result = mysql_query($query);

if(mysql_num_rows($result)) {
	$_SESSION['adminglog'] = "y";
	
	if ($remember) {
		setcookie("adminglog_cookie", "y", time()+31536000, "/");
	}
	
	header("Location: ./");
	exit;
} else {
	$_SESSION['adminglog'] = "n";
	header("Location: ./login.php");
	exit;
}

?>