<?php include('include/session.php'); ?>
<?php include('../connect.php');?>
<?php  include 'include/header.php'; 

?>
<?php 
include('../function.php');
        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        $limit = 2;
        $startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        $statement = "`tb_announcement`";
        
        
?>
			<!-- End Navbar -->
		<!-- Sidebar -->
		<?php  include 'include/nav.php'; ?>
        <?php echo include 'include/footer.php'; ?>
				<!-- End Sidebar -->
		<link href="../../../assets/css/bootstrap.css" rel="stylesheet"/>

	<link href="../../../assets/css/docs.css" rel="stylesheet"/>
	 
    <link href="../../../assets/style.css" rel="stylesheet"/>
	<link href="../../../assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>	
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
						 
</div>

          
        </div>
      
</div>
	</div>
				
	
</body>

</html>