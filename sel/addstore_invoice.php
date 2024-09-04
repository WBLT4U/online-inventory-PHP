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
						 

<div class="well">

 <?php
 $student = $_SESSION['student'];
								$id = $_SESSION['id'];
								include('../connect.php');
								$query = mysqli_query($conn, "select * from packer WHERE adminusername ='$student' AND id ='$id'");
                $row2 = mysqli_fetch_array($query);

$name = $row2['Username'];
$adminusername = $row2['adminusername'];

	?>
<?php
if(isset($_GET['id'])){
include('../connect.php');
//$id=$_GET['id'];
$id=$_GET['id'];
$result2 = mysqli_query($conn, "SELECT * FROM orders WHERE confirmation='$id' AND adminusername ='$student' AND casheir_status='PAID'");

						$qry_row=mysqli_num_rows($result2);
	
	
		
		if($qry_row > 0)
		
		{
			//$_SESSION['msg'] = "Invoice already generated." ;
			//header("location: cashstore_master.php");
			echo "<script>alert('Invoice already generated.'); window.location='seltore_master.php';</script>";
			
		?>
		
		<?php }
		

		
	else
	
	{
	
	//$id=$_GET['id'];
	$result = mysqli_query($conn, "SELECT * FROM orders where confirmation='$id' AND adminusername ='$student'");
		while($row = mysqli_fetch_array($result))
		$cid = $row['confirmation'];
			{
				
		$_SESSION['msg'] = "" ;	}}}
?>
<form NAME = "frmOne" action="execaddstore_invoice.php" method="post" enctype="multipart/form-data" onSubmit="return OnChange(this);" style="text-align: center">
  <p>
    <span style="text-align: center"></span>
    <input type="hidden" name="roomid" value="<?php echo $id=$_GET['id'] ?>" />
    <input type="hidden" name="cid" value="<?php echo $cid ?>" />
    <span style="text-align: center"></span>    <span style="text-align: center"></span> <br>
    
      <input name="student" type="hidden" class="ed" id="cashiername" value="<?php echo $adminusername ?>" readonly/><br>
    <span style="text-align: center"><span style="font-size: 16px; font-weight: bold;">Cashier Name</span><br>
      <input name="cashiername" type="text" class="ed" id="cashiername" value="<?php echo $name ?>" readonly/>
    <br >
     <input name="cashier_invoiceno" type="hidden" class="ed" id="authocode" value="<?php $rand = rand(0,999); $cf = "HOSP"; $pid = $cf.$rand ; echo $pid ; ?>" readonly />
      <br >
      <span style="font-weight: bold">Payment Method <br>
      <select name="pmethod" required>
        
        <option value="Cash Payment">Cash Payment</option>
        <option value="POS">POS</option>
        <option value="Transfer">Transfer</option>
      </select>
      </span><br>
                    <span style="font-weight: bold">Status <br >
                    <select name="cashier_status" class="ed" id="cashier_status" required>
                      <br>
                      <option></option>
                      <option value="PAID">PAID</option>
                    </select>
                    </span> <br >
      <br>
      <input type="submit" value="Save" id="button1">
    </span></p>
</form>
</div>

				
	

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