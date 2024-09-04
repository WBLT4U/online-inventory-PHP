<meta http-equiv="refresh" content="1; url=index.php">
<?php
if(isset($_POST['save'])) {
include('../connect.php');

	
	
			$transnum=$_POST['transnum'];
			$qty=$_POST['select2'];
			$name=$_POST['pname'];
			$unit=$_POST['unit'];
			$new=$_POST['txtstock'];
			$original_price=$_POST['original_price'];
			$id=$_POST['idd'];
			//$total=$_POST['txtDisplay'];
			$price=$_POST['selling_price'];
		  $dated = date('y:m:d');
            $time = date('g:i:a');
			//$pmethod=$_POST['pmethod'];
			$Cashiername=$_POST['Cashiername'];
			$adminusername=$_POST['adminusername'];
			$gname=$_POST['gname'];
			$total=$price * $qty;
			$o_ptotal=$original_price * $qty;
			$original_pricetotal=$price * $qty - $o_ptotal;
			
			
			$q =mysqli_query($conn, "INSERT INTO orders (product, unit, qty, confirmation, total, original_price, price, idd, date,time, packer_name, adminusername, gname, tstock) VALUES('$name', '$unit', '$qty', '$transnum', '$total', '$original_pricetotal', '$price', '$id', '$dated', '$time', '$Cashiername', '$adminusername', '$gname', '$new')");
			
			echo "<script> window.location.replace('orderproduct.php?id=$new')</script>";
			//header("location:index.php?id=$new");
			}

?>
