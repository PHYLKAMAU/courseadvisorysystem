<?php
	include_once('config.php');
	session_start();
	session_destroy();
	session_unset($_SESSION['email']);
	session_unset($_SESSION['fullname']);
	header("Location:login.php");
?>