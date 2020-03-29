<?php include ('head.php');?>

<body>
<?php include ('navbar.php');?>

    <div id="wrapper" style="margin-top:80px; background-color:white;">


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Voters List </h3>
                </div>
				 
                 <div class="container" style="position:fixed; margin-left:100px; margin-top:100px;" ><img width=200 height=200 src="https://lh3.googleusercontent.com/proxy/DhyBEZBnhSH_0JdxMhezGBV9o3lM6Gvf79Ahj_Yq160kFiYeE1bu9DnxWERNkKmGAlfu0ZAR-Jw4FG-m2q50hxMIx9s-53eoRY4n6c4laDXixf-llpsU" alt=""></div>
					
				
                    <div class="panel panel-default" style="margin:auto;">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                         
                                        <th>ID No.</th>
                                            <th>Name</th>
                                            
                                          
                                            <th>ward</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
                                            require 'admin/dbcon.php';
                                            
											
											$query = $conn->query("SELECT * FROM voters where account='active' ORDER BY voters_id DESC");
											while($row1 = $query->fetch_array()){
											$voters_id=$row1['voters_id'];
										?>
                                      
											<tr>
                                            <td><?php echo $row1 ['id_number'];?></td>

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

