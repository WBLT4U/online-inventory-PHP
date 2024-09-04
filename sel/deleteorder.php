<?php
include('../connect.php');
if(isset($_GET['id'])){
$id=$_GET['id'];
//$idi=$_GET['idd'];
//$qty=$_GET['st'];
//$dname=$_GET['product'];
$result = mysqli_query($conn, "SELECT * FROM orders WHERE id='$id' AND casheir_status='PAID'");

						$qry_row=mysqli_num_rows($result);
	
	
		
		if($qry_row > 0)
		
		{
			echo "<script>alert('Paid. Cant be deleted!'); window.location='orderproduct.php';</script>";
		?>
		
		<?php }
		

		
	else
	
	{


 $sql = mysqli_query($conn, "DELETE from orders WHERE id='$id'");
 echo "<script>alert('Deleted Successfully!'); window.location='orderproduct.php';</script>";
 
 
 //header("location: index.php");
}}

?>