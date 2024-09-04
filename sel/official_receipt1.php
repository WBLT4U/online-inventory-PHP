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
          <span style="font-size: 13px">Official Receipt</span><br /><font color="red"><U>UNPAID</U></font></h3>
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
		
		<br/>	
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
		<div class="row" style="margin-top:1em;">
          <div class="col-xs-12" style="margin-bottom:1em;"><i>Pay into any of the underlisted banks</i></div>
                    <div class="col-xs-12 col-sm-6 col-md-3" style="margin-bottom:1em;">
                     <div class="border1 borderRadius" style="padding:1em;">
                        <div><strong>Pay To:</strong></div>
                        <div><strong>Bank Name:</strong> GTBank</div>
                        <div><strong>Account No.:</strong> 0113699398</div>
                        <div><strong>Account Name:</strong> ABDULSALAM TAOFIQ</div>
                     </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3" style="margin-bottom:1em;">
                     <div class="border1 borderRadius" style="padding:1em;">
                        <div><strong>Pay To</strong>:</div>
                        <div><strong>Bank Name:</strong> Access Bank Plc</div>
                        <div><strong>Account No.:</strong> 0801721443</div>
                        <div><strong>Account Name:</strong> ABDULSALAM TAOFIQ</div>
                     </div>
                    </div>
          </div>
                				<div class="row">
<i> Please ensure you entered your Verification No.  at depositors field first, followed by your name</i>
as shown in bracket below:  
  <div><strong>(<?php echo $row['authocode']; ?> &nbsp;&nbsp; <?php echo $row['sname'] ?>)</strong>. <em> After you make payment send us an email to <font color="red"> wblt.com2021@gmail.com </font> with the below details: <br> 
  </em> Name of the depositor: <br>
  Amount Paid: <br>
  Teller Number: <br>
  and Verification No.: <br>
  <em> <font color="red"> After confirming your payment you will have fully access to the paid program immediately.</font> </div>

</div>
    </div>
        </div>
        </div>
    	
    </div>
				</div>	

	</body>
</html>
