<nav class="navbar navbar-default navbar-static-top navbar-primary navbar-fixed" role="navigation" style="margin-bottom:6px;background-color:#045;color:white;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="" style = "color:white; height:90px; line-height:80px;font-size:40px;">HAMRO VOTE</a>
                <div class="container" style="margin-left:80%;margin-top:-50px; font-size:30px;float:left;width:400px;"> Vote For The BEST</div>
            
            </div>
      
            

            <ul class="nav navbar-top-links navbar-right">
            
				<?php 
					require 'admin/dbcon.php';
					$query = $conn->query("SELECT * from voters where voters_id ='$_SESSION[voters_id]'")or die (mysqli_errno ());
					$row = $query->fetch_array();
				?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style = "color:white;font-size:14pt;">
						Welcome: <?php echo $row['firstname']." ".$row['lastname'];?><br>
                        Your ward: <?php echo $row['ward'];?>

					</a>
                 
                    <a  style="color:black; font-size:20px;background-color:white;width:100px;padding:10px;float:right;margin-right:10px" href="logout.php">Logout</a>
                </li>
            </ul>
            