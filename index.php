<?php
	session_start();

	if( !isset( $_SESSION['profileEmail']))
		header("Location: login.php");
	
	header("Location: profile.php");
?>