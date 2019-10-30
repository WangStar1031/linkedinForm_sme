<?php
	session_start();
	if( !isset( $_SESSION['profileEmail']))
		header("Location: login.php");
	$userEmail = $_SESSION['profileEmail'];
	if( $userEmail == "")
		header("Location: login.php");

	require_once __DIR__ . '/library/userManager.php';
	require_once __DIR__ . '/library/projectManager.php';
	require_once __DIR__ . '/library/countries.php';
	require_once __DIR__ . '/library/timezone.php';


	$id = getProfileIdFromEmail($userEmail);
	if( !$id){
		header("Location: login.php");
	}
	$profile = getProfileFromId($id);
	if( $profile['isFirst'] == 1){
		header("Location: profile.php");
	}
	include("assets/components/header.php");
	if( !$profile)
		header("Location: logout.php");
	if( isset($_POST['submit'])){
		if( isset($_POST['agree'])){
			if( $_POST['agree'] == 'on'){
				setAgree($id);
				header("Location: profile.php");
			}
		}
	}
?>

<h1>legal_doc</h1>
<form method="post">
	<p>This is legal document.</p>
	<label><input type="checkbox" name="agree"> I agree.</label><br>
	<button name="submit" type="submit">Submit</button>
</form>