<?php include ('session.php');?>
<?php include ('head.php');?>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('side_bar.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <h3 class="page-header">Verified Voters</h3>
            <div class="row">
              
				<?php 
					$count = $conn->query("SELECT COUNT(*) as total FROM `voters` where account='active'")->fetch_array();
					
                    
					?>
                <div class="container" style="font-size:20px;color:white;background-color:#056; width:250px; padding:10px;margin-top:10px; ">Total verified : <?php echo $count['total']?></div>

				
				
				
				<hr/>
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="modal-title" id="myModalLabel">         
												<div class="panel panel-primary">
													<div class="panel-heading" style="background-color:darkgreen;text-align:center;">
														Verified Voters
													</div>    
												</div>
											</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                         
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Status</th>
                                            <th>Account</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Verification</th>
                                            <th>Ward</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
                                            require 'dbcon.php';
                                            
											
											$query = $conn->query("SELECT * FROM voters where account='active' ORDER BY voters_id DESC");
											while($row1 = $query->fetch_array()){
											$voters_id=$row1['voters_id'];
										?>
                                      
											<tr>
												<td><?php echo $row1 ['id_number'];?></td>
												<td><?php echo $row1 ['firstname']." ". $row1 ['lastname'];?></td>
                                                <td><img src="../register/<?php echo $row1 ['photo'];?>" width="40px" height="40px" alt=""></td>

                                                <td><?php echo $row1 ['status'];?></td>
												<td><?php echo $row1 ['account'];?></td>
                                                <td><?php echo $row1 ['mobile'];?></td>
												<td><?php echo $row1 ['email'];?></td>


                                                <td> <a rel="tooltip"  title="Edit" id="<?php echo $row['voters_id'] ?>" href="#edit_voters<?php echo $row1['voters_id'] ?>"  data-toggle="modal"class="btn btn-success btn-outline"> Edit</a></td>
                                                <td><?php echo $row1 ['ward'];?></td>


                                                <?php 
													
													require 'edit_voters_modal.php';
												?>		
											</tr>
										
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
              
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->

    <?php include ('script.php');?>

</body>

</html>

