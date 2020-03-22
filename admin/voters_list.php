<?php include ('session.php');?>
<?php include ('head.php');?>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('side_bar.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Voters List</h3>
					
                </div>
				 
					
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="modal-title" id="myModalLabel">         
												<div class="panel panel-primary">
													<div class="panel-heading"><i class = "fa fa-users"></i>
														Voters List
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
                                         
                                            
                                            <th>Name</th>
                                            
                                          
                                            <th>ward</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
                                            require 'dbcon.php';
                                            
											
											$query = $conn->query("SELECT * FROM voters ORDER BY voters_id DESC");
											while($row1 = $query->fetch_array()){
											$voters_id=$row1['voters_id'];
										?>
                                      
											<tr>
												
												<td><?php echo $row1 ['firstname']." ". $row1 ['lastname'];?></td>
												
												
                                                <td><?php echo $row1 ['ward'];?></td>

                                            	
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

