<?php include('include/session.php'); ?>
<?php include('../connect.php');?>
<?php  include 'include/header.php'; 

?>
<?php
$transnum=$_SESSION['SESS_MEMBER_ID'];
?>
<?php 
include('../formatMoney.php');
        
        
?>
<?php 
$student = $_SESSION['student'];
$query = mysqli_query($conn, "select * from user WHERE contactno ='$student'");
                $row2 = mysqli_fetch_array($query);
				$sdate = date('Y/m/d');
				$expdate = $row2['expdate'];
		$expdates = date("$expdate");
		//$expdated = date("$expdates", strtotime("+1 week"));
		
		if ($sdate > $expdates) {			
	
        
        	$result3=mysqli_query($conn, "UPDATE user SET status ='INACTIVE' WHERE contactno ='$student'");
			
			$result3=mysqli_query($conn, "UPDATE p_records SET status ='INACTIVE' WHERE contactno ='$student'");
			
			echo "<script>alert('Subscription Due. Pls Subscrip.'); window.location='addwelcome.php';</script>";
			
			
		}
		
?>
			<!-- End Navbar -->
		<!-- Sidebar -->
		<?php  include 'include/nav.php'; ?>
        <?php echo include 'include/footer.php'; ?>
				<!-- End Sidebar -->
		<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   
  <script src="src/facebox.js" type="text/javascript"></script>

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
                        <h2>ADD PRODUCT </h2><br>
                        <br>
                        <div id="orderlist">
			<table width="50%" border="1" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
				<tr>
				  <td></td>
				  <td width="25"><div align="center"><strong>Qty</strong></div></td>
				  <td width="150"><div align="left"><strong>Name</strong></div></td>
				  <td width="25"><div align="center"><strong>Total<br> <?php echo $currency ?></strong></div></td>
				</tr>
				<?php				include('../connect.php');

				
				$result3 = mysqli_query($conn, "SELECT * FROM orders WHERE confirmation='$transnum' AND adminusername ='$student'");
					while($row3 = mysqli_fetch_array($result3))
						{
						echo '<tr>';
						
						echo '<td align="right"><a href="deleteorder.php?id='.$row3['id'].'&idd='.$row3['idd'].'&ip='.$row3['qtyb4'].'&st='.$row3['tstock'].'" id="'.$row3['id'].'" class="delbutton" title="Click To Delete"><img src="delete.png"></a></td>';
						echo '<td><div align="center">'.$row3['qty'].'</div></td>';
						echo '<td>'.$row3['gname'].'('.$row3['product'].')</td>';
						echo '<td><div align="center">'.$row3['total'].'</div></td>';
						echo '</tr>';
						}
				?>
				<tr>
				  <td colspan="3"><div align="right"><span style="color:#B80000; font-size:13px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Grand Total: <?php echo $currency ?></span></div></td>
				  <td><div align="center">
				  <?php				 
;
				  $result5 = mysqli_query($conn, "SELECT sum(total) FROM orders WHERE confirmation='$transnum' AND adminusername ='$student'");

					while($row5 = mysqli_fetch_array($result5))
					  { 
						echo $row5['sum(total)']; 
						$sfdddsdsd=$row5['sum(total)'];
					  }
				  ?>
				  
				 
				  </div>
				  </td>
				</tr>
				<tr>
				<td> <a href="generatetransno.php"> <input type="submit" value="Save"></a></td>
				</tr>
			</table>
		</div>
						 

<form method="POST" action="delete_product.php">
<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
									

  </h3>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
                                        
               
               <script language="JavaScript">
function toggle(source) {
checkboxes = document.getElementsByName('selector[]');
for(var i=0, n=checkboxes.length;i<n;i++) {
checkboxes[i].checked = source.checked;
}
}
</script> 
                               <thead>
					<tr>
                    <th> Name of Product/Drug Category </th>
						<th> Unit </th>
                        
                        <th> Price </th>
                        <th> Stock Qty </th>
						<th> Add Product </th>
					</tr>
				</thead>
				<tbody>
				<?php
					include('../connect.php');
			$result = mysqli_query($conn, "SELECT * FROM sendproducts WHERE adminusername ='$student'");
			while($row=mysqli_fetch_assoc($result))
			{
				echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['gname'].'('.$row['drugname'].')</td>';
				echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['unit'].'</td>';
				
				echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['selling_price'].'</td>';
				echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['tstock'].'</td>';
							echo '<td><div align="center"> <a rel="facebox" href="orderpage.php?id='.$row['id'].'&trnasnum='.$transnum.'" class="btn btn-success"> Add</a></div></td>';
							echo '</tr>';
						}
					?> 
				</tbody>
			</table>
			</form>
			
      
                            </div>
								</div>
							</div>
					<!----- end transaction of the day ----->
								</div>
								</div>
                                

				
	
</body>

</html><script>
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