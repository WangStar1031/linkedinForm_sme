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
?>

<h1>legal_doc</h1>
