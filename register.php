<?php include ('head.php');?>
<body>
<?php include ('navbar.php');?>


<?php
	function passFunc($len, $set = "")
		{
			$gen = "";
			for($i = 0; $i < $len; $i++)
				{
					$set = str_shuffle($set);
					$gen.= $set[0]; 
				}
			return $gen;
		} 
		
?>
    <div class ="container" id="wrapper" style="background-color:white; margin-top:70px;padding:20px;">

        <!-- Page Content -->
        <div>
            <div class="row">
                <div class="container text-center">
                    <h3>Voter Registration Form</h3>
                </div>
                <br><br><br>
				<div class = "container col-md-6">
					<div class="panel">
                        <div class="panel-heading">
                            Please Enter the Details Needed Below
                        </div>
                        <br>
                        <div class="panel-body">
                         <form method = "post" enctype = "multipart/form-data">	
											<div class="form-group">
												<label>ID Number</label>
												<input class ="form-control" type = "text" name = "id_number" placeholder = "ID number" required="true" autocomplete="off">
													
											</div>
											
											<div class="form-group">
											<?php 
													$change =  passFunc(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
											?>	
												<label>Password</label>
													<input class="form-control"  type = "text" name = "password" id = "pass" required="true" autocomplete="off" />
													<input type = "button" value = "Generate" onclick = "document.getElementById('pass').value = '<?php echo $change?>'">
											</div>
											
											<div class="form-group">
												<label>Firstname</label>
													<input class="form-control" type ="text" name = "firstname" placeholder="Firstname" required="true">
											</div>
											<div class="form-group">
												<label>Lastname</label>
													<input class="form-control"  type = "text" name = "lastname" placeholder="Please enter lastname" required="true">
											</div>

											<div class="form-group">
												<label>Citizenship Photo</label>
												<input type="file" name="image"required> 
											</div>
											
											<div class="form-group">
												<label>Year_Level</label>
													<select class = "form-control" name = "year_level">
														<option></option>
														<option>1st Year</option>
														<option>2nd Year</option>
														<option>3rd Year</option>
														<option>4th Year</option>
														
													</select>
											</div>
											<div class="form-group">
												<label>Ward</label>
													<select class = "form-control" name = "ward">
														<option></option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														
													</select>
											</div>

																	
											 	 <button name = "save" type="submit" class="btn btn-primary">Register</button>
												 
						  				 </div>
                                       
										
										</form>
								
							<?php 
								require 'register/dbcon.php';
								
								if (isset($_POST['save'])){
									$firstname=$_POST['firstname'];
									$lastname=$_POST['lastname'];
									$id_number=$_POST['id_number'];
									$year_level=$_POST['year_level'];
									$password = $_POST['password'];
									//$password=password_hash($password,PASSWORD_BCRYPT);

									$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
									$image_name= addslashes($_FILES['image']['name']);
									$image_size= getimagesize($_FILES['image']['tmp_name']);
									$ward = $_POST['ward'];
									move_uploaded_file($_FILES["image"]["tmp_name"],"register/upload/" . $_FILES["image"]["name"]);			
									$location="upload/" . $_FILES["image"]["name"];


									$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysql_error());
									$count = $query->fetch_array();

									if ($count  > 0){ 
									?>
										<script>
											alert("ID Number Already Exist");
										</script>
									<?php
										}
										else{
										$conn->query("insert into voters(id_number, password, firstname,lastname,year_level,status,img,ward) VALUES('$id_number', '$password','$firstname','$lastname','$year_level','Unvoted','$location','$ward')");
										
									?>
									
									
									<script>
										
										alert('Voters Successfully Registered');
										
									</script>
									
							<?php
									}
								} 
							?>
						  
						
						</div>
						</form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>

</html>

