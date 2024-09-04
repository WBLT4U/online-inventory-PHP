<?php
session_start();
unset($_SESSION['logged']) ;
unset($_SESSION['log']) ;
session_destroy() ;

$student = $_SESSION['student'];
								$id = $_SESSION['$id'];
								include('../connect.php');
$query = mysqli_query($conn, "select * from packer WHERE adminusername ='$student'");
                $row = mysqli_fetch_array($query);
date_default_timezone_set('Asia/Manila');
    $date=date('F j, Y g:i:a  ');
$quer = mysqli_query($conn, "update loginout_history set Time_out='$date' where CustomerID='$id'");




// $_SESSION['msg'] = "Logout Executed!" ;
echo "<script> window.location.replace('index.php')</script>";
//header("Location:index.php") ;
?>