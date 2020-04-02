<?php include ('head.php');?>

<body>
<?php include ('navbar.php');?>

    <div id="wrapper" style="margin-top:70px; background-color:white;">


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12 " style="background-color:#098;">
                    <h3 class="text-center " >Voters List </h3>
                </div>
				 
                 <div class="container col-md-3 text-center" ><img width=200 height=200 src="pictures\test-512.png" alt=""></div>

				
                    <div class="coontainer col-md-6 " >
                        
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
                    <div class="container col-md-3 text-center"  style="background-color:white;color:black;padding:100px;  " ><h4>Name not in Voter list?<br><h6>Please register or contact admin</h5></h6></div>

                    <!-- /.panel -->
              
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->


</body>

</html>

