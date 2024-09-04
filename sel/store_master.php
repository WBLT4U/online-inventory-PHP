<?php include('include/session.php'); ?>

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
<?php $student = $_SESSION['student'];
 include('../connect.php');
								$query = mysqli_query($conn, "select * from user WHERE contactno ='$student'");
                $row = mysqli_fetch_array($query);
				$name = $row['sname'];
	?>
<a href="javascript:Clickheretoprint()">Print</a>
<div id="print_content">
<div style="text-align: center; font-weight: bold;">
<p><span style="text-align: center; font-size: 16px;"><strong>BIAMBO PHARMACY LTD</strong></span><br>
  <span style="text-align: center; font-size: 13px;">Opp. Primary Sch. Board, Badon Hanya,  Sokoto</span><br>
  
  <span style="text-align: center; font-size: 13px;">Contact: <a href="#">08065268340</a> </span>
</div><br>
<h1> 
<span style="font-weight: bold; font-size: 20px;">STORE REPORTS</span>
<h1>
<table border="1" cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
							<th> S/No </th>
								<th  style="border-left: 1px solid #C1DAD7"> Drug Name</th>
								<th> Generic </th>
								<th> Vendor </th>
								<th> invoice </th>
								<th> Drugs Category </th>
                                
                <th> UCP</th>
                <th>  USP </th>
								<th> TCP </th>
                                <th> TUSP </th>
								
								
                <th> Reorder Level </th>
								<th> Unit </th>
                                <th> Stock Qty </th>
								<th> Purchase Date </th>
								<th> Expire Date </th>
								
								
							</tr>
						</thead>
						<tbody>
						
						<?php
							include('../connect.php');
							
							$result = mysqli_query($conn, "SELECT * FROM addproducts WHERE adminusername ='$student' order by id ASC");
							while($row = mysqli_fetch_array($result))
								{
									$tstock=$row['tstock'];
									$original_price=$row['original_price'];
									$toriginal_price=(double)$original_price * $tstock;
									$selling_price=$row['selling_price'];
									$tselling_price=$selling_price * $tstock;
							
									

									//$expire_date=$row['expire_date'];
									$current_date= date('y:m:d');
							$expiredate_notice=$row['expire_date'];
							
							$newDate=strtotime($current_date) - strtotime($expiredate_notice);
	if (date($newDate)=='-90 days') {
										
									$newDate="<strong style='color: #F00'>3 MONTHS TO EXPIRED</strong>";		
		} else {
		$newDate="";
		}
									
									
									$reorder=$tstock;
									if ($reorder <=200) {
										
									$reorder="<strong style='color: #F00'>LOW QTY</strong>";		
		} else {
			$reorder="";
		}
									
									
									echo '<tr class="record">';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['id'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['drugname'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['gname'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['vendor'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['invoice'].'</td>';
									
									echo '<td><div align="left">'.$row['drug_category'].'</div></td>';
									
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['original_price'].'</td>';
									echo '<td><div align="left">'.$row['selling_price'].'</div></td>';
									echo '<td><div align="left">'.$toriginal_price.'</div></td>';
									echo '<td><div align="left">'.$tselling_price.'</div></td>';
									
									echo '<td><div align="left">'.$reorder.'</div></td>';
									echo '<td><div align="left">'.$row['unit'].'</div></td>';
									echo '<td><div align="left">'.$row['tstock'].'</div></td>';
									echo '<td><div align="left">'.$row['purchase_date'].'</div></td>';
									echo '<td><div align="left">'.$row['expire_date'].'</div></td>';
									
									
									echo '</tr>';
								}
							?> 
                            </tbody>
                           
                        
					</table>
</div>