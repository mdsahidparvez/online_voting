<?php include ('../head.php');?>

<body>
<?php include ('../navbar.php');?>

    <div id="wrapper">


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Voters List</h3>
					
                </div>
				 
					
				
                    <div class="panel panel-default" style="margin:auto;">
                        
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
                                            
											
											$query = $conn->query("SELECT * FROM voters where account='active' ORDER BY voters_id DESC");
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


</body>

</html>

