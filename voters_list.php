<?php $page='voterlist'; include ('head.php');?>

<body>
    <?php include ('navbar.php');?>

    <div class="container-fluid" style="margin-top:60px; background-color:white; padding:40px;">


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12 text-center" style="font-size:40px; " >
                     <p>Voters List</p> 
                </div>
				 
                    <div class="container col-md-3 text-center " style="position:relative;margin-top:60px;color:blue;"><h3> <i class="fas fa-search"></i>voter id</h3><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for ID no."></div>
				
                    <div class="container col-md-6 " >
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="">
                                <table id="myTable" class="table table-striped table-bordered table-hover" >
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
                    <div class="container col-md-3 text-center"  style="background-color:white;color:black;padding:5px;  " ><h4>Name not in Voter list?<br><h6>Please register or contact admin</h5></h6></div>

                    <!-- /.panel -->
              
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->


</body>

<script>///search voter list
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</html>

