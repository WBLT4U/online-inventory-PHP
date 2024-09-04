<?php include('include/session.php'); ?>
<?php include('../connect.php');

function formatMoney($number, $fractional=false) {
                if ($fractional) {
                  $number = sprintf('%.2f', $number);
                }
                while (true) {
                  $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                  if ($replaced != $number) {
                    $number = $replaced;
                  } else {
                    break;
                  }
                }
                return $number;
              }  

?>
<!DOCTYPE html>
<html lang="en">


    <title>FMIS</title>
	
	<head>
   
		
		<link href="receipt.css" media="all" rel="stylesheet" type="text/css" />


<script>
function myFunction()
{
        var printButton = document.getElementById("printpagebutton");
        var back = document.getElementById("back");
        printButton.style.visibility = 'hidden';
        back.style.visibility = 'hidden';
        printButton.style.visibility = 'hidden';
        window.print()
}

</script>
	</head>


	<body >
		<a id="back" href="mpayment.php">Back</a>
        <div id="print">
<a href="" id="printpagebutton" onclick="myFunction()"><B>Print</B></a>
		
		<h3 class="one">FARM MANAGEMENT SYSTEM<br/>
		  <span style="font-size: 13px">Official Receipt<br/>
		  <font color="blue">PAID</font></span></h3>
		<div class="printtitle">
			<hr>
			<p><font color="black"><strong>Company Address</strong></font></p>
			<p>Main Office:
            The company is located at Shop 20, Usmanu Danfodiyo University Mini-Mart, Sokoto.</p>
			<p>Email Address:taofiqabdulsalam@gmail.com</p>
			<p>Contact No:  08066713592, 08157225633</p>
		  <hr></div>
		
		<table>
			<?php
			$id=$_GET['id'];
			
			$query= mysqli_query($conn, "select * from p_record WHERE stdid='$id'");
			$row=mysqli_fetch_array($query);
			//$CID=$row['customerID'];
              //  $tax=$row['tax'];
			?>
			<tr>
			  <td width="21%" style="text-align: right"><span style="font-weight: bold">Verification No.:</span>                  
			  <td width="79%"><?php echo $row['authocode'];?>                            
		  <tr style="text-align: right"><td colspan="2"></td></tr>
			<tr style="text-align: right"><td colspan="2"></td></tr>
			<tr><td style="text-align: right"><span style="font-weight: bold">Date:</span></td>
			  <td><?php echo $row['Date_paid'];?></td>
			</tr>
			<tr style="text-align: right"><td colspan="2"></td></tr>
			<tr style="text-align: right"><td colspan="2"></td></tr>
			<tr><td style="text-align: right"><span style="font-weight: bold">Customer Name:</span></td>
			  <td><?php echo $row['sname'];?></td>
			</tr>
			<tr style="text-align: right"><td colspan="2"></td></tr>
			<tr style="text-align: right"><td colspan="2"></td></tr>
			<tr><td style="text-align: right"><span style="font-weight: bold">Phone No.:</span>
			<td><?php echo $row['contactno'];?>              			</tr>
			<tr>
		    <td colspan="2"></td>
						
          <tr><td colspan="2"></td></tr>
		</table>
		
		<br/><br/>	
		<table border="" color="black">
			<thead>
				
				<th>Price</th>
				<th>Durations</th>
				<th>Total</th>
			</thead>
			<tbody>
            <tr>
				<?php
				$id=$_GET['id'];
			$query2= mysqli_query($conn, "select * from p_record WHERE stdid='$id'");
			$row2=mysqli_fetch_array($query2);

				echo '<tr><td><div align="center">₦ '.formatMoney($row2['price'],2).'</div></td>';
				echo '<td><div align="center">'.$row2['durations'].' Month</div></td>';
				echo '<td><div align="center"> ₦ '.formatMoney($row2['total'],2).'</div></td></tr>';

				?>
			</tr>
			            <tr>
            <td colspan="2" style="text-align:right;"><b>TOTAL AMOUNT:</b></td>
				<td style="text-align:center;"> ₦ 				  <?php
				$id=$_GET['id'];
          $result5 = mysqli_query($conn, "SELECT sum(total) FROM p_record WHERE stdid='$id'");
          while($row5 = mysqli_fetch_array($result5))
            { 
             $total=$row5['sum(total)'];   
            echo ''.formatMoney($total,2);
            }
          ?></td>
            </tr>

		</tbody>
		</table>
		<br>
		<br>
		<br/><br/>	
		</div>	

	</body>
</html>
