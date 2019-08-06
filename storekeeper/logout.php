<?php
	session_start();
  	unset($_SESSION['sid']);
  	header("location: login.php");
?>