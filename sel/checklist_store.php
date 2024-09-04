<?php include('include/session.php'); ?>
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>

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
include('../connect.php');//para sa connection sang database
								$query = mysqli_query($conn, "select * from packer WHERE adminusername ='$student'");
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
<a href="javascript:Clickheretoprint()">Print</a>
<div id="print_content">
<div style="text-align: center; font-weight: bold;">
<p><span style="text-align: center; font-size: 16px;"><strong><?php echo $row2['cname']; ?></strong></span><br />
  <span style="text-align: center; font-size: 13px;"><?php echo $row2['address']; ?></span><br />
  <span style="text-align: center; font-size: 13px;"><?php echo $row2['email']; ?></span><br />
  <span style="text-align: center; font-size: 13px;"> <a href="#"><?php echo $row2['phone']; ?></a></span></div>
<span style="font-size: 20px; font-weight: bold;">DISPENSARY AUDIT CHECK</span></div><br><br>
  <?php $student = $_SESSION['student'];
  $id = $_SESSION['id'];
  include('../connect.php');
								$query = mysqli_query($conn, "select * from packer WHERE adminusername ='$student' AND id ='$id'");
                $row = mysqli_fetch_array($query);
                $name = $row['Username']; ?>
	
	<?php echo "Pharmacist Name " ."<font color='#86bde8'>".$name ."</font>" ;?>
    <br>
  
<table border="1" cellpadding="1" cellspacing="1" id="resultTable">
				  <thead>
							<tr>
							<th> S/No </th>
								<th  style="border-left: 1px solid #C1DAD7"> Product Name</th>
								
	              <th>Dosage Form</th>
                               
								<th>Opening Stock</th>
 <th> Qty Disp</th>
								<th> Stock Balance</th>
								
								
							</tr>
						</thead>
						<tbody>
						
						<?php
							include('../connect.php');
							
							$result = mysqli_query($conn, "SELECT * FROM sendproducts WHERE adminusername ='$student'");
				while($row = mysqli_fetch_array($result))
								{
									$tstock=$row['tstock'];
									$btstock=$row['btstock'];
									$tbtstock=$btstock - $tstock;
									

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
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['drugname'].'('.$row['gname'].')</td>';
																		
									echo '<td><div align="left">'.$row['drug_category'].'</div></td>';

echo '<td><div align="left">'.$row['btstock'].'</div></td>';
echo '<td><div align="left">'.$tbtstock.'</div></td>';									
echo '<td><div align="left">'.$row['tstock'].'</div></td>';

									
									echo '</tr>';
								}
							?> 
                            </tbody>
                           
                        
					</table>
</div>