<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="  background-color: rgb(2, 34, 70) !important;
height:70px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="margin-top:10px;  font-size: 25px;letter-spacing: 2px;font-weight: bolder;font-family: Varela Round, sans-serif;; color: white !important; margin-left: 20px;"> HAMRO VOTE </a>
				
            </div>
      

            <ul class="nav navbar-top-links navbar-right">
            <a   href="logout.php" style = "color: white; background-color:#f55;padding:10px;margin-right:20px;">
            <i class = "fa fa-sign-out-alt" ></i> Logout
                          
                    </a>
               <?php require 'dbcon.php';
				$query = $conn->query("SELECT * from user where user_id ='$session_id'")or die (mysql_error ());
				
				while ($row = $query->fetch_array()){
				
				
			 ?>
                <li class="dropdown">
				<img src="<?php echo $row ['img']?>" style="border:2px solid white;width:50px;height:50px;border-radius:100%;" onclick="window.open(this.src)" alt="">
											
											
                    </a>
                    
                
                </li>
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style = "color: white; font-size:20px;">
					Admin: <?php echo $user_username = $user_row['firstname']." ".$user_row['lastname'];?>
                          
                    </a>
                    
                
                </li>
                
           
            </ul>
			<?php }?>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li class="admin">
                        <a href="candidate.php">Admin Panel </a>

                            <a href="candidate.php"><i class="fas fa-user-cog" ></i> </a>
                        </li>
                        <li clas="nav-item">
                            <a href="testingemail.php"><i class="fas fa-envelope" ></i>Email</a>
                        </li>
                            
                        <li>
                            <a href="candidate.php" ><i class = "fa fa-user fa-fw"></i>Manage Candidates</a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="candidate.php">All candidates</a>
                                </li>
                                <li>
                                    <a href="ward_1_candidate.php">Ward 1</a>
                                </li>
                                
                            </ul>
						<li>
                            <a href="#"><i class="fa fa-users"></i>Manage Voters</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="voters.php"><i class = "fa fa-user fa-fw"></i>View Voters</a>
                                </li>
                                <li>
                                    <a href="../register.php"><i class = "fa fa-user fa-fw"></i>Add Voters</a>
                                </li>
                                <li>
                                    <a href="pending_registration.php"> <i class="fas fa-user-clock"></i>Pending Registration Verification</a>
                                </li>
                        <li>
                            <a href="verified_voters.php" > <i class="fas fa-user-check"></i>Verified Voters</a>
                        </li>
						
                        <li>
                            <a href="rejected_voters.php" > <i class="fas fa-user-times"></i>Rejected Voters</a>
                        </li>
						
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                        <li>
                            <a href="canvassing.php" ><i class="fa fa-download fa-fw"></i>REPORT</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="ward1_report.php" ><i class="fa fa-download fa-fw"></i> ward-1-Report</a>
                                </li>
                                <li>
                                    <a href="ward2_report.php" ><i class="fa fa-download fa-fw"></i> ward-2-Report</a>
                                </li>
                                <li>
                                    <a href="ward3_report.php" ><i class="fa fa-download fa-fw"></i> ward-3-Report</a>
                                </li>
                                <li>
                                    <a href="ward4_report.php" ><i class="fa fa-download fa-fw"></i> ward-4-Report</a>
                                </li>
                       

                            </ul>

                        </li>
                     
                        <li>
                            <a href="../voters_list.php" ><i class="fas fa-list-alt"></i>Voters List</a>
                        </li>
                        <li>
                            <a href="schedule_election.php"><i class="far fa-clock"></i>Schedule Election</a>
                        </li>
                        <li>
                            <a href="user.php"><i class="fa fa-user fa-fw"></i>System User</a>
                           
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                             <a href="logout.php"> <i class = "fa fa-sign-out-alt" ></i>Logout</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div class="container" style="margin-top:80px;">
        </div>