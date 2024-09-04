<?php
	include('../connect.php');
	$id = $_POST['id'];	
	$Username=$_POST['Username'];
	$Password=md5 ($_POST['Password']);
	
	$result = mysqli_query($conn, "UPDATE packer SET Username='$Username', Password='$Password' WHERE id='$id'");
	
	 echo "<script> window.location.replace('sel.php')</script>";
	//header("location: packer.php");
?>