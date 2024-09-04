<?php

session_start() ;
if(isset($_POST['submit'])){

$name=$_POST['Username'];
$password=md5($_POST['password']);
include('../connect.php');
$result2 = mysqli_query($conn, "Select * From packer Where Username='$name' AND Password = '$password'");

	
			$num = mysqli_num_rows($result2) ;
			$row2=mysqli_fetch_array($result2);
			
					
	if($num == 0){
		//$_SESSION['err_msg'] = "Invalid Login Email/Phone No. or Password" ;
		
	echo "<script> alert('Invalid Login Phone No. or Password'); window.location.replace('index.php')</script>";
		exit() ;
		}
	else if($num == 1){
		$_SESSION['logged'] = "True" ;
		$_SESSION['log'] = 1 ;
		$_SESSION['student']=$row2['adminusername'];
		$_SESSION['id']=$row2['id'];
		unset($_GLOBALS['message']);
		
		$memid=$row2['id'];
                            
                            
$Fname=$row2['Username'];
$user=$row2['Username'];
date_default_timezone_set('Asia/Manila');
    $date=date('F j, Y g:i:a  ');
    
$result=mysqli_query($conn, "insert into loginout_history(CustomerID,User,Name,Time_in,Time_out)values('$memid','$user','$Fname','$date','')");
		
		$_SESSION['err_msg'] = "Login Successfull! Welcome!" ;
		echo "<script> alert('Login Successfull! Welcome!'); window.location.replace('addwelcome.php')</script>";
		
		}
		
	}
?>
