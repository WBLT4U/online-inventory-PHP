	<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="/upload/adex_me.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									
									<span class="user-level">Admin</span>
									
								</span>
							</a>
							</div>
					</div>
					<ul class="nav nav-primary">
					    
						<li class="nav-item <?php if($das==="1") echo "active" ?>">						
						<a href="addwelcome.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item <?php if($das==="2") echo "active" ?>">
							<a data-toggle="collapse" href="#user">
								<i class="fas fa-user"></i>
								<p>Products</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="user">
								<ul class="nav nav-collapse">
									<li>
										<a href="generatetrans.php">
											<span class="sub-item">Order Products</span>
										</a>
									</li>
                                    <li>
										<a href="selstore_master.php">
											<span class="sub-item">Sales Products</span>
										</a>
									</li>
                                    									
								</ul>
							</div>
						</li>
						
                        <li class="nav-item <?php if($das == "6") echo "active"?>">
							<a  href="checklist_store.php">
							 <i class="fas fa-file-archive"></i>
								<p>Checklist</p>
								
							</a>
							</li>
                            <li class="nav-item <?php if($das == "7") echo "active"?>">
							<a  href="user.php">
							<i class="fas fa-unlock-alt"></i>
								<p>Account Update</p>
								
							</a>
							</li>
						
						
						
							<li class="nav-item">
							<a  href="logout.php">
							 <i class="fas fa-sign-out-alt"></i>
								<p>Log Out</p>
								
							</a>
							</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->