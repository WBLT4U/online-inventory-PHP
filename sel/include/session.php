<?php
session_start() ;
if($_SESSION['logged'] != "True" && $_SESSION['log'] != 1 ) {
	$_SESSION['msg'] = "Access Denied! Login Required." ;
	echo "<script> window.location.replace('index.php')</script>";
	} 
?>
