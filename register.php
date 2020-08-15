<?php  $page='registervoter'; include ('head.php'); ?>
<body>
<link rel="stylesheet" href="register.css">

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
    <div class ="container-fluid" id="wrapper" style="background-color:#0008; margin-top:60px;padding:50px;">
		<div class ="container col-md-9" id="wrapper" style="background-color:white;padding:50px; ">

		<?php 	//////////////////FORM VALIDATION
			require 'register/dbcon.php';

			if (isset($_POST['save'])){
				$firstname=$_POST['firstname'];
				$middlename=$_POST['middlename'];
				$lastname=$_POST['lastname'];
				$mobile=$_POST['mobile'];
				$email=$_POST['email'];
				$id_number=$_POST['id_number'];
				$dob=$_POST['dob'];
				$ward = $_POST['ward'];

				
				$today=date("Y-m-d"); //getting today date
				$diff=date_diff(date_create($dob),date_create($today));//subtracting date
				$age=$diff->format('%y');
			//	$new_date = date('Y-m-d', strtotime($_POST['dob']));//getting dob from input
				
				
				$pass = $_POST['password'];
				$password=password_hash($pass,PASSWORD_BCRYPT);//pasword hashing

				//add voter photo
				$image1= addslashes(file_get_contents($_FILES['image1']['tmp_name']));
				move_uploaded_file($_FILES["image1"]["tmp_name"],"register/upload/" . $_FILES["image1"]["name"]);			
				$location1="upload/" . $_FILES["image1"]["name"];


				//add image of citizenship front
				$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name= addslashes($_FILES['image']['name']);
				$image_size= getimagesize($_FILES['image']['tmp_name']);
				move_uploaded_file($_FILES["image"]["tmp_name"],"register/upload/" . $_FILES["image"]["name"]);			
				$location="upload/" . $_FILES["image"]["name"];
				

				//add image of citizenship back
				$image2= addslashes(file_get_contents($_FILES['image2']['tmp_name']));
				move_uploaded_file($_FILES["image2"]["tmp_name"],"register/upload/" . $_FILES["image2"]["name"]);			
				$location2="upload/" . $_FILES["image2"]["name"];
				

				// check if id already exists in the database
				$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysql_error());
				$count = $query->fetch_array();

				if ($count  > 0){ 
				
					echo "<h2><p class=\"alert-danger text-center\" ><strong>ERROR!</strong> ID already exists</p></h2>";					
				
				}
				elseif ($age<16){
					echo "<h2><p class=\"alert-danger text-center\" ><strong>ERROR!</strong> Age below 16 are not allowed to Register </p></h2>";					

				}
				elseif (strlen($pass)<8) {

					echo "<h2><p class=\"alert-danger text-center\" ><strong>ERROR!</strong> Password must be atleast 8 character long </p></h2>";					
					
				}
				elseif (strlen($mobile)!=10) {

					echo "<h2><p class=\"alert-danger text-center\" ><strong>ERROR!</strong> Mobile number must be 10 digit </p></h2>";					
					
				}
				else{ ///insert registration details into database
					$conn->query("insert into voters(photo,id_number, password, firstname,middlename,lastname,status,img,citizenship_back,ward,dob,mobile,email) VALUES('$location1', '$id_number', '$password','$firstname','$middlename', '$lastname','Unvoted','$location','$location2','$ward','$dob','$mobile','$email')");
					
					echo "<h2><p class=\"alert-success text-center\" ><strong>SUCCESS!</strong> Your form is successfully submitted for verification.<br>Check voter list within 5 days </p></h2>";
								
				}
			} 
		?> <!------end form validation ---->

        <!-- Page Content -->
        <div>
            <div>
                <div class="container text-center" style="font-size:25px; background-color:black;color:white;">
                    Voter Registration Form
                </div>
                <br><br><br>
				<div class = "container col-md-12">
					<div class="panel">
                    
                    
                        <div class="panel-body">
						 <form method = "post" enctype = "multipart/form-data">	
						 					<div class="form-group f1">
												<label>Upload Your Photo</label>
												<input id="inpFile" type="file" name="image1"required> 
												<img id="previewImage" src="images\user.png" width="200px" height="200px" alt="">

											</div>
											<div class="form-group f2">
												<label>ID Number</label>
												<input class ="form-control" type = "text" name = "id_number" placeholder = "ID number" required="true" autocomplete="off">
												
											</div>
											
											<div class="form-group f3">
											<?php 
													$change =  passFunc(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
											?>	
												<label>Password</label>
													<input class="form-control"  type = "text" placeholder="minimum 8 character" name = "password" id = "pass" required="true" autocomplete="off" />
													<input type = "button" value = "Generate" onclick = "document.getElementById('pass').value = '<?php echo $change?>'">
											</div>
											
											<div class="form-group">
												<label>Firstname</label>
													<input  class="form-control" type ="text" name = "firstname" placeholder="Firstname" required="true">
											</div>
											<div class="form-group">
												<label>Middlename</label>
													<input  class="form-control" type ="text" name = "middlename" placeholder="Middle name">
											</div>
											<div class="form-group">
												<label>Lastname</label>
													<input class="form-control"  type = "text" name = "lastname" placeholder="Please enter lastname" required="true">
											</div>
											<div class="form-group">
												<label>Mobile </label>
													<input class="form-control"  type = "number" name = "mobile" placeholder="enter your mobile number" required="true">
											</div>
											<div class="form-group">
												<label>Email address </label>
													<input class="form-control"  type = "email" name = "email" placeholder="enter your email address" required="true">
											</div>


											<div class="form-group">
												<label>Citizenship Photo Front</label>
												<input id="inpFile1" type="file" name="image"required>
												<img id="previewImage1" src="" width="200px" height="200px" alt="">
 
											</div>
											<div class="form-group">
												<label>Citizenship Photo Back</label>
												<input id="inpFile2" type="file" name="image2"required>
												<img id="previewImage2"  src="" width="200px" height="200px" alt="">
 
											</div>
											<div class="form-group">
												<label for="birthday">Date of Birth:</label>
												<input type="date" id="" name="dob" required >
											</div>
											
											
											<div class="form-group">
												<label>Ward</label>
													<select class = "form-control" name = "ward"  required="true">
														<option value="">select your ward </option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														
													</select>
											</div>

																	
											 	 <button name = "save" type="submit" class="btn btn-primary">Register</button>
												 
						  				 </div>
                                       
										
										</form>
								
							
						
						</div>
						</form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
	 	</div>
    </div>
    <!-- /#wrapper -->



	<script>
		//preview the upload file in modal
		const inpFile=document.getElementById("inpFile");
		const previewImage =document.getElementById("previewImage")
		var src;
		inpFile.addEventListener("change", function(event){
			if(event.target.files.length>0){
				src = URL.createObjectURL(event.target.files[0]);

				previewImage.src=src;
				console.log(src);


			}

		});

		//preview citizenship front photo
		const inpFile1=document.getElementById("inpFile1");
		const previewImage1 =document.getElementById("previewImage1")
		var src;
		inpFile1.addEventListener("change", function(event){
			if(event.target.files.length>0){
				src = URL.createObjectURL(event.target.files[0]);

				previewImage1.src=src;
				console.log(src);


			}

		});
		//preview citizenship back photo
		const inpFile2=document.getElementById("inpFile2");
		const previewImage2 =document.getElementById("previewImage2")
		var src;
		inpFile2.addEventListener("change", function(event){
			if(event.target.files.length>0){
				src = URL.createObjectURL(event.target.files[0]);

				previewImage2.src=src;
				console.log(src);


			}

		});


	
	</script>
	
</body>



</html>

