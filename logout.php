<?php
session_start();
$_SESSION['profileEmail'] = "";
header('Location: login.php');
?>