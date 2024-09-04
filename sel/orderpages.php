<?php include('include/session.php'); ?>
<html>
<head>
<title>Order Page</title>
<script language="javascript">

</script>
 <script language="javascript" type="text/javascript">

function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(countryId) {		
		
		var strURL="findState.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getCity(countryId,stateId) {		
		var strURL="findCity.php?country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["form1"]["total"].value;
var p=document.form1.country.value;
if (x==null || x=="")
  {
  alert("Take Your Order first");
  return false;
  }
  if(p=="")
  {
  alert("Select Method Of Payment");
  return false;
  }
var con = confirm("Are You Sure? you want to order this product?");
if (con ==false)
{
return false;
}
}
</script>

</head>

<?php
include('../connect.php');
$id=$_GET['id'];
$result2 = mysqli_query($conn, "SELECT * FROM sendproducts WHERE id='$id'");
while($row2 = mysqli_fetch_array($result2))
	{
	$selling_price=$row2['selling_price'];
	$drugname=$row2['drugname'];
	$original_price=$row2['original_price'];
	$tstock=$row2['tstock'];
	$rselling_price=$row2['rselling_price'];
	$unit=$row2['unit'];
	$gname=$row2['gname'];
	
	echo '<span style="color:#B80000; font-size:16px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">'.$row2['drugname'].'</span><br>';
	//echo '<span style="font-size:11px; font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:17px;color:#000000;">'.$row2['description'].'</span>';
	}
?>
 <?php $student = $_SESSION['student'];
 $id = $_SESSION['id'];
								$query = mysqli_query($conn, "select * from packer WHERE adminusername ='$student' AND id ='$id'");
                $row3 = mysqli_fetch_array($query);
                //$id = $row['id']; ?>


<script type="text/javascript" language="Javascript">
	
    function OnChange(value){
		
		
		quantity = parseFloat(document.frmOne.select2.value);
		avai = parseFloat(document.frmOne.txtstock.value);

        
		if (quantity>avai)
	{
		alert("You have exceded the number of available items");
		return false;
	}
	
	
	}
	
	
	
</script>


<script language="javascript">
/*function stock(){
var qtty = document.frmOne.select2.value;
var available = document.frmOne.txtstock.value;

if (qtty>available)
{
	alert("You have exceded the number of available items");
		return false;
	}
}*/
</script>


<form NAME = "frmOne" action="initiateorder.php" method="post" enctype="multipart/form-data" onSubmit="return OnChange(this);">
	<p>
     <input type="hidden" name="transnum" value="<?php echo $_GET['trnasnum'] ?>" />
    <input type="hidden" name="idd" value="<?php echo $id; ?>" />
    <input type="hidden" name="gname" value="<?php echo $gname; ?>" />
	<INPUT type="hidden" name = "original_price" size = "35" value ="<?php echo $original_price ?>" style="display:none;">
	<INPUT type="hidden" name = "pname" size = "35" value ="<?php echo $drugname ?>" style="display:none;">
   
    <br>
	 <INPUT TYPE = "hidden" name = "Cashiername" size = "35" value ="<?php echo $row3['Username']; ?>" style="display:none;">
    <span style="font-size:11px; font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:17px;color:#000000;">
<INPUT TYPE = "hidden" name = "adminusername" size = "35" value ="<?php echo $row3['adminusername']; ?>" style="display:none;">
    <span style="font-size:11px; font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:17px;color:#000000;">    
Quantity : </span>
	<input type="number" name="select2" style="width:60px;" placeholder="1, 20, ..." required/> 
	
	 <span style="color:#B80000; font-size:16px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;"> = </span> <?php echo $currency ?>
     <select name="selling_price" required>
			   <option value="<?php echo $selling_price ?>"><?php echo $selling_price ?></option>	
		
  </select>
	<br>
	 
		<INPUT TYPE = "hidden" name = "unit" size = "35" value ="<?php echo $unit ?>" style="border:#999999 solid 1px; background-color:#FFF; width:100px; height:20px;" readonly>
	<br>
    </p>
	<p>Total in stock
  <INPUT TYPE = "Text" name = "txtstock" size = "35" value ="<?php echo $tstock; ?>" style="border:#999999 solid 1px; background-color:#FFF; width:100px; height:20px;" readonly>
	  
	  <br>
      <br>
	  <input name="save" type="submit" id="save" style="padding:10px; border-radius:15px; background-color:green; border:none; color:#ffffff; font-weight:bold; border: 1px solid #000000" value="Add To Cart"/>
  </p>
</form>
</html>