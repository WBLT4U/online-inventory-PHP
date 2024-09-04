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
								$query = mysqli_query($conn, "select * from user WHERE contactno ='$student'");
                $row = mysqli_fetch_array($query);
                $id = $row['stdid']; ?> <b>Welcome!  </b> <?php echo $row['sname'];?> </a> </h5>
							</div>
							
						</div>
						</div>
						</div>
						<!----- surplus data balance ------>
						<br>
                        <br>
						 

<div class="well">

 <form action="disp_reportsmaster.php" target="my-iframe" class="form-horizontal" method="post">
       <div class="control-group">
          <label class="control-label" for="password">Enter Product Name:</label> 
         <select name="from" class="ed">
		 <?php
		
		include('../connect.php');
		  $admin = $_SESSION['admin'];
 //$a=$_POST['from'];
                //$b=$_POST['to'];
		$result = mysqli_query($conn, "SELECT * FROM addproducts");
		
		while($row = mysqli_fetch_array($result))
						{
							echo "<option value=\"" . $row['drugname'] . "\">" . $row['drugname']. "</option>";
        }
			
				
				
				?>
     
            
         </select>&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
         <input name="submit" class="btn btn-default"  type="submit" value="Search" />
        </div>
      </form>
	  <div>
      <br>
      <br>
	  <form action="disp_reportsmasters.php" target="my-iframe" class="form-horizontal" method="post">

       <div class="control-group">
          <label class="control-label" for="password">From:</label> 
        <input name="from" type="date" id="password" class="input-xlarge" required/>&nbsp;&nbsp;&nbsp;
             <label class="control-label" for="password">To:</label>
             <input name="to" type="date" id="password" class="input-xlarge" required/>&nbsp;&nbsp;&nbsp;
         <input name="submit" class="btn btn-default"  type="submit" value="Search" />
        </div>
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