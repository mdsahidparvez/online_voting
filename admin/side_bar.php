<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0; background-color:white;height:90px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="..\pictures\logo.png" width="200px;" height="50px;" alt=""> </a>
				
            </div>
      

            <ul class="nav navbar-top-links navbar-right">
            <a   href="logout.php" style = "color: white; background-color:#f55;padding:10px;">
					Logout
                          
                    </a>
               <?php require 'dbcon.php';
				$query = $conn->query("SELECT * from user where user_id ='$session_id'")or die (mysql_error ());
				
				while ($row = $query->fetch_array()){
				
				
			 ?>
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style = "color: black; font-size:30px;">
					Admin: <?php echo $user_username = $user_row['firstname']." ".$user_row['lastname'];?>
                          
                    </a>
                    
                
                </li>
                
           
            </ul>
			<?php }?>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="background-color:#056;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="candidate.php" style="background-color:black; color:white; font-size:30px;text-align:center;height:90px; line-height:60px;">Admin Panel </a>
                        </li>
                        <li>
                            
                        <li>
                            <a href="candidate.php" style="background-color:#045;color:white;font-size:20px;"><i class = "fa fa-user fa-fw"></i> Manage Candidates</a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="candidate.php"> All candidates</a>
                                </li>
                                <li>
                                    <a href="ward_1_candidate.php"> Ward 1</a>
                                </li>
                                
                            </ul>
						<li>
                            <a href="#" style="background-color:#056; color:white;"><i class="fa fa-users"></i> Manage Voters<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="voters.php"><i class = "fa fa-user fa-fw"></i> View Voters</a>
                                </li>
                                <li>
                                    <a href="../register/index.php"><i class = "fa fa-user fa-fw"></i> Add Voters</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="pending_registration.php" style="background-color:#067; color:white;font-size:20px;"> Pending Registration Verification</a>
                        </li>
						
                        <li>
                            <a href="canvassing.php" style="background-color:#078; color:white;font-size:15px;"><i class="fa fa-download fa-fw"></i> REPORT</a>
                        </li>
                        <li>
                            <a href="ward1_report.php" style="background-color:#078; color:white;font-size:15px;"><i class="fa fa-download fa-fw"></i> ward-1-Report</a>
                        </li>
                       
                        <li>
                            <a href="voters_list.php" style="background-color:#068; color:white;font-size:15px;"></i> Voters List</a>
                        </li>
                        <li>
                            <a href="user.php" style="background-color:#ddd; color:black;font-size:20px;margin-top:90px;padding:20px;"><i class="fa fa-user fa-fw"></i> System User</a>
                           
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                             <a href="logout.php" style="background-color:white;color:black;font-size:20px;padding:20px;"> <i class = "fa fa-sign-out" ></i>Logout</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>