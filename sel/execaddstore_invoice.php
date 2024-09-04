<?php
	include('../connect.php');
	$roomid = $_POST['roomid'];
	$cashiername=$_POST['cashiername'];
	$cashier_invoiceno=$_POST['cashier_invoiceno'];
			$cashier_status=$_POST['cashier_status'];
			$pmethod=$_POST['pmethod'];
			$cid=$_POST['cid'];
			$student=$_POST['student'];
			$dated = date('y:m:d');
            $time = date('g:i:a');
			
			$query= mysqli_query($conn, "select * from orders where confirmation='$cid' AND adminusername ='$student'");
while($row3=mysqli_fetch_array($query)){
$count=mysqli_num_rows($query);
$pid=$row3['idd'];
$qty= $row3['qty'];

$query2= mysqli_query($conn, "select * from sendproducts where ids='$pid' AND adminusername ='$student'");
$row2=mysqli_fetch_array($query2);
$quantity=$row2['tstock'];


 $quer= mysqli_query($conn, "UPDATE sendproducts SET tstock = tstock - $qty WHERE ids ='$pid' and tstock='$quantity' ");
			
			
	$q = mysqli_query($conn, "UPDATE orders SET cashiername='$cashiername', cashier_invoiceno='$cashier_invoiceno', casheir_status='$cashier_status', date='$dated', time='$time', pmethod='$pmethod' WHERE confirmation='$roomid'");
}
	
	 echo "<script> window.location='selstore_master.php';</script>";
	//header("location: drugs_master.php");
?>