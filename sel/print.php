<?php include('include/session.php'); ?>
<title>Print</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title></title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<style>
#print_content{
width:434px;
margin:0 auto;
}
</style>
<?php $student = $_SESSION['student'];
$id = $_SESSION['id'];
include('../connect.php');//para sa connection sang database
								$query = mysqli_query($conn, "select * from packer WHERE adminusername ='$student' AND id ='$id'");
                $row = mysqli_fetch_array($query);
                //$id = $row['id']; ?>
                <?php
 $student = $_SESSION['student'];
include('../connect.php');//para sa connection sang database
$result2=mysqli_query($conn, "SELECT * FROM invoice WHERE contactno ='$student'");
$row2=mysqli_fetch_array($result2);

//$name = $row2['Username'];
//$adminusername = $row2['adminusername'];

	?>
<a href="javascript:Clickheretoprint()"></a>
<div id="print_content">
<div style="text-align: center; font-weight: bold;">
<p><span style="text-align: center; font-size: 16px;"><strong><?php echo $row2['cname']; ?></strong></span><br />
  <span style="text-align: center; font-size: 13px;"><?php echo $row2['address']; ?></span><br />
  <span style="text-align: center; font-size: 13px;"><?php echo $row2['email']; ?></span><br />
  <span style="text-align: center; font-size: 13px;"> <a href="#"><?php echo $row2['phone']; ?></a></span></div><br>
<?php
include('../connect.php');
$student = $_SESSION['student'];
		$id=$_GET['id'];
		$result = mysqli_query($conn, "SELECT * FROM orders WHERE confirmation='$id' AND adminusername ='$student'");
		$row = mysqli_fetch_array($result);
			
				echo '<strong> Date:</strong> '.$row['date'].' '.$row['time'].'<br>';
				echo '<strong>Receipt No.:</strong> '.$row['confirmation'].'<br>';
				echo '<strong>Payment Method:</strong> '.$row['pmethod'].'<br>';
				echo '<strong>Served By:</strong> '.$row['packer_name'].'<br>';
				
								
	?>
   <br> 		
<table cellpadding="5" cellspacing="0" id="resultTable" border="1" width="80%">
		<tr>
        <td width="12%"> <strong>S/N</strong></td>
			<td width="38%"> <strong>Drug/Item</strong></td>
			<td width="15%"> <strong>Qty</strong> </td>
            <td width="17%"> <strong>Unit Price</strong> </td>
             <td width="19%"> <strong>Sub Total</strong> </td>
		</tr>
        </table>
        <table cellpadding="5" cellspacing="0" id="resultTable" border="1" width="80%">

	<?php
		
		$id=$_GET['id'];
		$results = mysqli_query($conn, "SELECT * FROM orders WHERE confirmation='$id' AND adminusername ='$student'");
		while($rows = mysqli_fetch_array($results))
			{
				$price=$rows['price'];
				$qty=$rows['qty'];
				$value=$price * $qty;
				echo '<tr class="record">';
				
				echo '<td width="38%">'.$rows['product'].'</td>';
				echo '<td width="15%">'.$rows['qty'].'</td>';
				echo '<td width="17%">'.$rows['price'].'</td>';
				echo '<td width="18%">'.$value.'</td>';
				echo '</tr>';
			}
	?>
    </table>
    <script>
var tables = document.getElementsByTagName('table');
var table = tables[tables.length -1];
var rows = table.rows;
for(var i = 0, td; i < rows.length; i++){
td = document.createElement('td');
td.appendChild(document.createTextNode(i + 1));
rows[i].insertBefore(td, rows[i].firstChild);
}
</script>

    <table cellpadding="5" cellspacing="0" id="resultTable" border="1" width="80%">

	<?php
		$id=$_GET['id'];
		$resulta = mysqli_query($conn, "SELECT sum(total) FROM orders WHERE confirmation='$id' AND adminusername ='$student'");
		$rowa = mysqli_fetch_array($resulta);
			
				echo '<tr class="record">';
				
				echo '<td width="34%"></td>';
				echo '<td width="22%"><strong>'.' Grand Total'.'</strong></td>';
				echo '<td width="19%"><strong> <font color="0000">'.$currency.$rowa['sum(total)'].'</font></strong></td>';
				echo '</tr>';
			
	?> 
</table>
<span style="font-weight: bold"><?php echo $row2['footer']; ?> </span></div>
<a href="selstore_master.php">Back</a>
