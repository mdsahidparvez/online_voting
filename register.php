<?php  $page='registervoter'; include ('head.php'); ?>
<body>
	<link rel="stylesheet" href="register.css"> <!--css for registration form -->

	<?php include ('navbar.php'); ?>


						  
	<?php
		//generates the random string 
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
		$passFunc=passFunc(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');	
			
	?>
    <div class ="container-fluid " id="wrapper" style="background-color:rgba(0,0,0,0.7); margin-top:60px;padding:50px;">
		<div class ="container col-md-9 animate__animated animate__fadeIn" id="wrapper" style="background-color:white;padding:50px;animation-duration:1.8s; ">

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
			?> 
			<!------end form validation ---->

			<!-- Page Content -->
			<div class="">
				<div>
					<div class="container text-center" style="font-size:25px; background-color:black;color:white;">
						Voter Registration Form
					</div>
					<br><br><br>
					<div class = "container col-md-12">
						<div class="panel">
							<div class="panel-body">
								<form method = "post" enctype = "multipart/form-data">	
									<div class="form-group f1" style="width:100%;display:flex;justify-content:space-between;">
										<label>Upload Your Photo</label>
										<input id="inpFile" type="file" name="image1"required> 
										<img id="previewImage" src="https://saddletreehomes.com/wp-content/uploads/2020/05/default-user-icon-4.jpg" width="200px" height="200px" alt="">
									</div>
									<div class="login_details">
										<div class="title">Login Details</div>
										<div class="form-group f2">
											<label>ID Number</label>
											<input style="background-color:#0ff;color:#000;text-align:center;font-weight:bold;"class ="form-control" readonly value="<?php echo $passFunc ?>" type = "text" name = "id_number" placeholder = "ID number" required="true" autocomplete="off">
											
										</div>
										
										<div class="form-group f3">
											<?php 
													$change =  passFunc(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
											?>	
											<label>Password</label>
												<input class="form-control"  type = "text" placeholder="minimum 8 character" name = "password" id = "pass" required="true" autocomplete="off" />
												<!--<input type = "button" value = "Generate" onclick = "document.getElementById('pass').value = '<?php echo $change?>'">-->
										</div>
										<div class="note">
											Keep the ID and Password Safe. Required for login to the system.
										</div>
									</div>
									
									<div class="personal-details">
										<div class="title">Personal Details</div>
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
											<label>Gender</label>
											<select class = "form-control" name = "gender"  required="true">
												<option value="">select your Gender </option>
												<option>Male</option>
												<option>Female</option>
												<option>Other</option>
												
											</select>
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
													<label for="birthday">Date of Birth:</label>
													<input type="date" id="" name="dob" required >
										</div>
								
										<table border="1" >
											<thead>
												<th>3 Generation Details</th>
												<th>First Name</th>
												<th>Middle Name</th>
												<th>Last Name</th>
											</thead>
											<tbody>							
												<tr><td>Husband / Wife Name</td>
													<td><input type="text"></td>
													<td><input type="text"></td>
													<td><input type="text"></td>
												</tr>
												<tr><td>Father Name</td>
													<td><input type="text"></td>
													<td><input type="text"></td>
													<td><input type="text"></td>
												</tr>
												<tr><td>Mother Name</td>
													<td><input type="text"></td>
													<td><input type="text"></td>
													<td><input type="text"></td>
												</tr>
												<tr><td>Grandfather</td>
													<td><input type="text"></td>
													<td><input type="text"></td>
													<td><input type="text"></td>
												</tr>
											</tbody>
										</table>	
									</div>
									<div class="citizenship-details-wrapper">
										<div class="header">
											<div class="title">Citizenship Details</div>

											<div class="contents">
												<div class="form-group">
													<label> ID No.</label>
													<input class ="form-control" type = "text" name = "citizenship_id_number" placeholder = "Citizenship ID number" required="true" autocomplete="off">
												</div>
												<div class="form-group">
													<label>Issued District</label>
													<select style="text-transform:capitalize;" class = "form-control" name = "issued_district"  required="true">
														<option value="">select district </option>
														<!--- dynamically generating options for all 77 districts using JSON file -->
														<?php 
															function select_districts(){
																$districts=file_get_contents('districts.json');
																$districts=json_decode($districts);
																foreach($districts as $district){
																		echo '<option style="text-transform:capitalize;">'.$district.'</option>';
																} 
															}
															select_districts();

														
														?>
													</select>
												</div>
												<div class="form-group">
													<label>Citizenship type</label>
													<select class = "form-control" name = "citizenship_type"  required="true">
														<option value="">select type </option>
														<option>Descent</option>
														<option>Naturalized</option>
														<option>Honorary</option>

												
													</select>
												</div>
											
												<div class="form-group">
													<label for="citizenship_issued_date">Issued Date</label>
													<input type="date" id="" name="dob" required >
												</div>
											</div>


										</div>
										<div class="form-group" >
											<label>Citizenship Photo Front</label>
											<input id="inpFile1" type="file" name="image"required>
											<img id="previewImage1" src="" width="200px" height="200px" alt="">

										</div>
										<div class="form-group" >
											<label>Citizenship Photo Back</label>
											<input id="inpFile2" type="file" name="image2"required>
											<img id="previewImage2"  src="" width="200px" height="200px" alt="">

										</div>
									</div>
								
									<div class="permanent_address_details">
										<div class="title">Permanent Address Details</div>
										<div class="form-group">
											<label>District</label>
											<select style="text-transform:capitalize;" class = "form-control" name = "permanent_district"  required="true">
												<option value="">select district </option>
												<!--- dynamically generating options for all 77 districts using JSON file -->
												<?php 
													select_districts();
												?>

												
											</select>

										</div>
										<div class="form-group">
											<label>VDC / Municapility</label>
											<select style="text-transform:capitalize;" class = "form-control" name = "permanent_district"  required="true">
												<option value="">select  </option>
												<!--- dynamically generating options for all 77 districts using JSON file -->
												<?php 
													select_districts();
												?>

												
											</select>

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

										
									</div>
									<button name = "save" type="submit" class="btn btn-primary">Register</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
     
    </div> <!-- end main wrapper-->



	<script>
		//preview the upload file in the form
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

