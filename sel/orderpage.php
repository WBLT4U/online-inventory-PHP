<?php include('include/session.php'); ?>
<?php include('../connect.php');?>
<?php  include 'include/header.php'; 

?>
<?php 
include('../formatMoney.php');
        
        
?>
			<!-- End Navbar -->
		<!-- Sidebar -->
		<?php  include 'include/nav.php'; ?>
        <?php echo include 'include/footer.php'; ?>
				<!-- End Sidebar -->
		<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2"><a href="#"><?php $student = $_SESSION['student'];
								$id = $_SESSION['id'];
								$query = mysqli_query($conn, "select * from packer WHERE adminusername ='$student' AND id ='$id'");
                $row = mysqli_fetch_array($query);
                $id = $row['id']; ?> <b>Welcome!  </b> <?php echo $row['Username'];?> </a> </h5>
							</div>
							
						</div>
						</div>
						</div>
						<!----- surplus data balance ------>
						<br>
                        <br>
                        <br>
                        <br>
						 

<div class="well">

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
    <span style="font-size:14px; font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:17px; color:#000000; font-weight: bold;">    
Quantity : </span>
	<input type="number" name="select2" style="border:#999999 solid 1px; background-color:#FFF; width:100px; height:30px;" placeholder="1, 20, ..." required/> 
	
	 <span style="color:#B80000; font-size:16px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;"> = </span> <?php echo $currency ?>
     <select name="selling_price" required>
			   <option value="<?php echo $selling_price ?>"><?php echo $selling_price ?></option>	
		
  </select>
	<br>
	 
		<INPUT TYPE = "hidden" name = "unit" size = "35" value ="<?php echo $unit ?>" style="border:#999999 solid 1px; background-color:#FFF; width:100px; height:20px;" readonly>
	<br>
    </p>
	<p><span style="font-weight: bold"><span style="color: #000">Total in stoc</span>k</span>
	  <INPUT TYPE = "Text" name = "txtstock" size = "35" value ="<?php echo $tstock; ?>" style="border:#999999 solid 1px; background-color:#FFF; width:100px; height:20px;" readonly>
	  
	  <br>
      <br>
	  <input name="save" type="submit" id="save" style="padding:10px; border-radius:15px; background-color:green; border:none; color:#ffffff; font-weight:bold; border: 1px solid #000000" value="Add To Cart"/>
  </p>
</form>
</div>


				
	
</body>

</html>
<script>
function validate()
{
   new_pass=document.getElementById('new_password').value;
   cpass=document.getElementById('cpassword').value;

	if(cpass!=new_pass)
	{
	   alert("Confirmation password does not correspond with the password");
	   document.getElementById('cpassword').focus();
	   return false;
	}
}
</script>
<script>
	    $("#realuser").click(function() {
	        var name=$("#name").val();
	        var username=$("#username").val();
	        var phone=$("#phone").val();
	        var email=$("#email").val();
	        var password=$("#password").val();
	       var status = $('#status').find(":selected").val();
	       swal({
  title: "Dear <?php echo $row['Firstname'];?>",
  text: "Are  you  sure you want to Add" + ' ' + name,
  icon: "warning",
  buttons: true,
  dangerMode: true,
}) 
.then((willDelete) => {
  if (willDelete) {
      
      
      $.ajax({
           type:'POST',
         beforeSend: function(){
            $.LoadingOverlay("show");
                 },
         url: '../assets/addcustomer.php',
            data: {
                          id: <?php echo $row['id']; ?>,
                          name:name,
                          username:username,
                          email:email,
                          phone:phone,
                          password:password,
                          status:status
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You successfully added " + ' ' + name,
                              icon: "success",
                              button: "Okay",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
            success:  location.reload()
                                  });
                            });
                          }else{
                     $.LoadingOverlay("hide");
            swal(response.title, response.message, response.status)
                
                      }
                      },
                      complete: function(response){
                        $.LoadingOverlay("hide")
                      }
                      
                  });

      
      
  }
  else{
    swal("you pressed cancel ");
  }
 });
	    });
	</script>				

	<!--   Core JS Files   -->
	
	
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>

</html>