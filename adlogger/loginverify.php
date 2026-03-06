<?php
session_start();

if ($_SESSION['adminglog'] != "y") {
	if (isset($_COOKIE['adminglog_cookie'])) {
		$_SESSION['adminglog'] = "y";
	} else {
		header("Location: ./login.php");
		exit;
	}
}
?>