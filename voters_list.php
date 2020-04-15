<?php $page='voterlist'; include ('head.php');?>

<body>
<?php include ('navbar.php');?>

    <div id="wrapper" style="margin-top:80px; background-color:white;">


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12 " style="background-color:#098;color:white;">
                    <h3 class="text-center " >Voters List </h3>
                </div>
				 
                 <div class="container col-md-3 text-center" style="margin-top:100px;" ><img width=200 height=200 src="pictures\test-512.png" alt=""></div>
                    <div class="container col-md-3 " style="position:absolute;margin-top:60px;margin:50px;color:blue;"><h1> <i class="fas fa-search"></i>voter id</h1><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for ID no."></div>
				
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
                    <div class="container col-md-3 text-center"  style="background-color:white;color:black;padding:100px;  " ><h4>Name not in Voter list?<br><h6>Please register or contact admin</h5></h6></div>

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

