<?php include('include/session.php'); ?>
<?php include('../connect.php');?>
<?php  include 'include/header.php'; 

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
		$expdated = date("Y/m/d", strtotime($expdates. " + 2 days"));
	//	$expdated = date('$expdates', strtotime($sdate. ' + 3 days'));
		
		if ($sdate > $expdated) {			
	
        
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
                        <h2>SELL PRODUCTS</h2><br>
                        <br>
						 

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
					
                    <th> Seller name </th>
					<th> invoice No. </th>
						
						<th> Product Name</th>
						<th> cashier name</th>
						
						<th> cashier status</th>
						
                        <th> product qty</th>
						<th> date</th>
						<th> time</th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
				<?php
					include('../connect.php');
					$student = $_SESSION['student'];
					$result = mysqli_query($conn, "SELECT * FROM orders WHERE adminusername ='$student' ORDER BY id DESC");
					while($row = mysqli_fetch_array($result))
						{
							
							echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['packer_name'].'</td>';
							echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['confirmation'].'</td>';
							
							echo '<td><div align="left">'.$row['product'].'</div></td>';
							echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['cashiername'].'</td>';
							
							echo '<td style="border-left: 1px solid #C1DAD7;"><strong style="color: #00F">'.$row['casheir_status'].'</strong></td>';
							
							echo '<td><div align="left">'.$row['qty'].'</div></td>';
							echo '<td><div align="left">'.$row['date'].'</div></td>';
							echo '<td><div align="left">'.$row['time'].'</div></td>';
							echo '<td><div align="left">';
						
						?>
                        <?php 
     $stats=$row['casheir_status'];

     if ($stats=="") {
      ?>
      <a  rel="tooltip"  title="Edit" id="<?php echo $id; ?>" onClick="return window.confirm('Are you sure you want to delete?')" href="deletestore.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><font size="2">DELETE</font></a>
      <br><br>
          <a  rel="tooltip"  title="Edit" id="<?php echo $id; ?>" href="addstore_invoice.php?id=<?php echo $row['confirmation'];?>" class="btn btn-success"><font size="2">Generate Invoice</font></a>
          <br><br>
          
        <!---------------------their is a receipt--->   
     
   <?php } else { ?>
          <br>
          <a  rel="tooltip"  title="Edit" id="<?php echo $id; ?>" href="print.php?id=<?php echo $row['confirmation'];?>" class="btn btn-success"><font size="2">Receipt</font></a>
          <br><br>
          
    <?php 
	echo '</div></td>';
	
	}
            
     ?>
                            <?php
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