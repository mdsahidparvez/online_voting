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
					$citizenship_id_no=$_POST['citizenship_id_number'];
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
			
					// check if citizenship_id_no already exists  in the database
					$query2 = $conn->query("SELECT * FROM voters WHERE citizenship_id_no='$citizenship_id_no'") or die (mysql_error());
					$count2 = $query2->fetch_array();


					// check if id already exists in the database
					$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysql_error());
					$count = $query->fetch_array();

					


					if ($count  > 0){ 
					
						echo "<h2><p class=\"alert-danger text-center\" ><strong>ERROR!</strong> ID already exists</p></h2>";					
					
					}
					elseif($count2  > 0){ 
					
						echo "<h2><p class=\"alert-danger text-center\" ><strong>ERROR!</strong>Citizenship  ID already exists</p></h2>";					
					
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
						$conn->query("insert into voters(photo,id_number, password, firstname,middlename,lastname,status,img,citizenship_back,ward,dob,mobile,email,citizenship_id_no) VALUES('$location1', '$id_number', '$password','$firstname','$middlename', '$lastname','Unvoted','$location','$location2','$ward','$dob','$mobile','$email','$citizenship_id_no')");
						
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
											<?php $passFunc=passFunc(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'); ?>
											<label>ID Number</label>
											<input  id="id_number" style="background-color:#0ff;color:#000;text-align:center;font-weight:bold;"class ="form-control"   type = "text" name = "id_number" placeholder = "ID number" required="true" autocomplete="off">
											<input type = "button" value = "Generate" onclick = "document.getElementById('id_number').value = '<?php echo $passFunc ?>'">

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
													<label>Citizenship ID No.</label>
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
													<input type="date" id="" name="issued_dob" required >
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
											<select class="form-control" id="zone" autofocus>
												<option disabled selected>-- Zone --</option>
												<option>Mechi</option>
												<option>Koshi</option>
												<option>Sagarmatha</option>
												<option>Janakpur</option>
												<option>Bagmati</option>
												<option>Narayani</option>
												<option>Gandaki</option>
												<option>Lumibini</option>
												<option>Dhaulagiri</option>
												<option>Rapti</option>
												<option>Karnali</option>
												<option>Bheri</option>
												<option>Seti</option>
												<option>Mahakali</option>
											</select>
											</div>
											<div class="form-group">
											<select class="form-control" id="state">
												<option disabled selected>-- Province --</option>
												<option value="Province_1">Province 1</option>
												<option value="Province_2">Province 2</option>
												<option value="Province_3">Province 3</option>
												<option value="Province_4">Province 4</option>
												<option value="Province_5">Province 5</option>
												<option value="Province_6">Province 6</option>
												<option value="Province_7">Province 7</option>
											</select>
											</div>
											<div class="form-group">
											<select class="form-control" id="district">
											</select>
											</div>
											<div class="form-group">
											<select class="form-control" id="mun">
											</select>
											</div>
											<div class="form-group">
											<input type="text" class="form-control" id="locality" placeholder="Locality or Tole">
											</div>
											<div class="form-group">
											<input type="tel" class="form-control"  name="ward" id="ward" placeholder="Ward No. (ex. 1)" maxlength="2">
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


	<!---script for select zone district municipality--->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script>
$(function() {
/*************** place ****************/
	var state=0;
	var data=[
				//state 1 starts
				[
					["ईलाम",["ईलाम नगरपालिका","देउमाई नगरपालिका","माई नगरपालिका","सूर्योदय नगरपालिका","फाकफोकथुम गाउँपालिका","चुलाचुली गाउँपालिका","माईजोगमाई गाउँपालिका","माङसेबुङ गाउँपालिका","रोङ गाउँपालिका","सन्दकपुर गाउँपालिका"]],
					["उदयपुर",["कटारी नगरपालिका","चौदण्डीगढी नगरपालिका","त्रियुगा नगरपालिका","वेलका नगरपालिका","उदयपुरगढी गाउँपालिका","ताप्ली गाउँपालिका","रौतामाई गाउँपालिका","लिम्चुङ्बुङ गाउँपालिका","रोङ गाउँपालिका","सन्दकपुर गाउँपालिका"]],
					["ओखलढुंगा",["सिद्दिचरण नगरपालिका","खिजिदेम्बा गाउँपालिका","चम्पादेवी गाउँपालिका","चिशंखुगढी गाउँपालिका","मानेभञ्याङ गाउँपालिका","मोलुङ गाउँपालिका","लिखु गाउँपालिका","सुनकोशी गाउँपालिका"]],
					["खोटाङ",["हलेसी तुवाचुङ नगरपालिका","दिक्तेल रुपाकोट मझुवागढी नगरपालिका","ऐसेलुखर्क गाउँपालिका","रावा बेसी गाउँपालिका","जन्तेढुंगा गाउँपालिका","खोटेहाङ गाउँपालिका","केपिलासगढी गाउँपालिका","दिप्रुङ चुइचुम्मा गाउँपालिका","साकेला गाउँपालिका","वराहपोखरी गाउँपालिका"]],
					["झापा",["मेचीनगर नगरपालिका","दमक नगरपालिका","कन्काई नगरपालिका","भद्रपुर नगरपालिका","अर्जुनधारा नगरपालिका","शिवशताक्षी नगरपालिका","गौरादह नगरपालिका","विर्तामोड नगरपालिका","कमल गाउँपालिका","गौरीगंज गाउँपालिका","बाह्रदशी गाउँपालिका","झापा गाउँपालिका","बुद्धशान्ति गाउँपालिका","हल्दिवारी गाउँपालिका","कचनकवल गाउँपालिका"]],
					["ताप्लेजुङ",["फुङलिङ नगरपालिका","आठराई त्रिवेणी गाउँपालिका","सिदिङ्वा गाउँपालिका","फक्ताङलुङ गाउँपालिका","मिक्वाखोला गाउँपालिका","मेरिङदेन गाउँपालिका","मैवाखोला गाउँपालिका","पाथीभरा याङवरक गाउँपालिका","सिरीजङ्घा गाउँपालिका"]],
					["तेहथुम",["म्याङलुङ नगरपालिका","लालीगुराँस नगरपालिका","आठराई गाउँपालिका","छथर गाउँपालिका","फेदाप गाउँपालिका","मेन्छयायेम गाउँपालिका"]],
					["धनकुटा",["सिद्दिचरण नगरपालिका","खिजिदेम्बा गाउँपालिका","चम्पादेवी गाउँपालिका","चिशंखुगढी गाउँपालिका","मानेभञ्याङ गाउँपालिका","मोलुङ गाउँपालिका","लिखु गाउँपालिका","सुनकोशी गाउँपालिका"]],
					["पाँचथर",["फिदिम नगरपालिका","फालेलुङ गाउँपालिका","फाल्गुनन्द गाउँपालिका","हिलिहाङ गाउँपालिका","कुम्मायक गाउँपालिका","मिक्लाजुङ गाउँपालिका","तुम्बेवा गाउँपालिका","याङवरक गाउँपालिका"]],
					["भोजपुर",["भोजपुर नगरपालिका","षडानन्द नगरपालिका","टेम्केमैयुङ गाउँपालिका","रामप्रसाद राई गाउँपालिका","अरुण गाउँपालिका","पौवादुङमा गाउँपालिका","साल्पासिलिछो गाउँपालिका","आमचोक गाउँपालिका","हतुवागढी गाउँपालिका"]],
					["मोरंग",["विराटनगर महानगरपालिका","बेलवारी नगरपालिका","लेटाङ नगरपालिका","पथरी शनिश्चरे नगरपालिका","रंगेली नगरपालिका","रतुवामाई नगरपालिका","सुनवर्षि नगरपालिका","उर्लावारी नगरपालिका","सुन्दरहरैचा नगरपालिका","बुढीगंगा गाउँपालिका","धनपालथान गाउँपालिका","ग्रामथान गाउँपालिका","जहदा गाउँपालिका","कानेपोखरी गाउँपालिका","कटहरी गाउँपालिका","केरावारी गाउँपालिका","मिक्लाजुङ गाउँपालिका"]],
					["संखुवासभा",["चैनपुर नगरपालिका","धर्मदेवी नगरपालिका","खाँदवारी नगरपालिका","मादी नगरपालिका","पाँचखपन नगरपालिका","भोटखोला गाउँपालिका","चिचिला गाउँपालिका","मकालु गाउँपालिका","सभापोखरी गाउँपालिका","सिलीचोङ गाउँपालिका"]],
					["सुनसरी",["ईटहरी उपमहानगरपालिका","धरान उपमहानगरपालिका","ईनरुवा नगरपालिका","दुहवी नगरपालिका","रामधुनी नगरपालिका","बराहक्षेत्र नगरपालिका","देवानगञ्ज गाउँपालिका","कोशी गाउँपालिका","गढी गाउँपालिका","बर्जु गाउँपालिका","भोक्राहा नरसिंह गाउँपालिका","हरिनगर गाउँपालिका"]],
					["सोलुखुम्बु",["सोलुदुधकुण्ड नगरपालिका","माप्य दुधकोशी गाउँपालिका","खुम्वु पासाङल्हमु गाउँपालिका","थुलुङ दुधकोशी गाउँपालिका","नेचासल्यान गाउँपालिका","माहाकुलुङ गाउँपालिका","लिखु पिके गाउँपालिका","सोताङ गाउँपालिका"]]
				],
			 
			  //state 2 starts
			  
			  [
			  	["सप्तरी",["राजविराज नगरपालिका","कञ्चनरुप नगरपालिका","डाक्नेश्वरी नगरपालिका","बोदेबरसाईन नगरपालिका","खडक नगरपालिका","शम्भुनाथ नगरपालिका","सुरुङ्‍गा नगरपालिका","हनुमाननगर कङ्‌कालिनी नगरपालिका","सप्तकोशी नगरपालिका","अग्निसाइर कृष्णासरवन गाउँपालिका","छिन्नमस्ता गाउँपालिका","महादेवा गाउँपालिका","तिरहुत गाउँपालिका","तिलाठी कोईलाडी गाउँपालिका","रुपनी गाउँपालिका","राजगढ गाउँपालिका","बिष्णुपुर गाउँपालिका","बलान-बिहुल गाउँपालिका"]],
				["सिराहा",["लहान नगरपालिका","धनगढीमाई नगरपालिका","सिरहा नगरपालिका","गोलबजार नगरपालिका","मिर्चैयाँ नगरपालिका","कल्याणपुर नगरपालिका","कर्जन्हा नगरपालिका","सुखीपुर नगरपालिका","भगवानपुर गाउँपालिका","औरही गाउँपालिका","विष्णुपुर गाउँपालिका","बरियारपट्टी गाउँपालिका","लक्ष्मीपुर पतारी गाउँपालिका","नरहा गाउँपालिका","सखुवानान्कारकट्टी गाउँपालिका","अर्नमा गाउँपालिका","नवराजपुर गाउँपालिका"]],
				["धनुषा",["जनकपुरधाम उपमहानगरपालिका","क्षिरेश्वरनाथ नगरपालिका","गणेशमान चारनाथ नगरपालिका","धनुषाधाम नगरपालिका","नगराइन नगरपालिका","विदेह नगरपालिका","मिथिला नगरपालिका","शहीदनगर नगरपालिका","सबैला नगरपालिका","कमला नगरपालिका","मिथिला बिहारी नगरपालिका","हंसपुर नगरपालिका","जनकनन्दिनी गाउँपालिका","बटेश्वर गाउँपालिका","मुखियापट्टी मुसहरमिया गाउँपालिका","लक्ष्मीनिया गाउँपालिका","औरही गाउँपालिका","धनौजी गाउँपालिका"]],
				["महोत्तरी",["जलेश्वर नगरपालिका","बर्दिबास नगरपालिका","गौशाला नगरपालिका","लोहरपट्टी नगरपालिका","रामगोपालपुर नगरपालिका","मनरा शिसवा नगरपालिका","मटिहानी नगरपालिका","भँगाहा नगरपालिका","बलवा नगरपालिका","औरही नगरपालिका","एकडारा गाउँपालिका","सोनमा गाउँपालिका","साम्सी गाउँपालिका","महोत्तरी गाउँपालिका","पिपरा गाउँपालिका"]],
				["सर्लाही",["ईश्वरपुर नगरपालिका","मलंगवा नगरपालिका","लालबन्दी नगरपालिका","हरिपुर नगरपालिका","हरिपुर्वा नगरपालिका","हरिवन नगरपालिका","बरहथवा नगरपालिका","बलरा नगरपालिका","गोडैटा नगरपालिका","बागमती नगरपालिका","कविलासी नगरपालिका","चक्रघट्टा गाउँपालिका","चन्द्रनगर गाउँपालिका","धनकौल गाउँपालिका","ब्रह्मपुरी गाउँपालिका","रामनगर गाउँपालिका","विष्णु गाउँपालिका","कौडेना गाउँपालिका","पर्सा गाउँपालिका","बसबरीया गाउँपालिका"]],
				["रौतहट",["चन्द्रपुर नगरपालिका","गरुडा नगरपालिका","गौर नगरपालिका","बौधीमाई नगरपालिका","बृन्दावन नगरपालिका","देवाही गोनाही नगरपालिका","गढीमाई नगरपालिका","गुजरा नगरपालिका","कटहरिया नगरपालिका","माधव नारायण नगरपालिका","मौलापुर नगरपालिका","फतुवाबिजयपुर नगरपालिका","ईशनाथ नगरपालिका","परोहा नगरपालिका","राजपुर नगरपालिका","राजदेवी नगरपालिका","दुर्गा भगवती गाउँपालिका","यमुनामाई गाउँपालिका"]],
				["वारा",["कलैया उपमहानगरपालिका","जीतपुर सिमरा उपमहानगरपालिका","कोल्हवी नगरपालिका","निजगढ नगरपालिका","महागढीमाई नगरपालिका","सिम्रौनगढ नगरपालिका","पचरौता नगरपालिका","आदर्श कोटवाल गाउँपालिका","करैयामाई गाउँपालिका","देवताल गाउँपालिका","परवानीपुर गाउँपालिका","प्रसौनी गाउँपालिका","फेटा गाउँपालिका","बारागढीगाउँपालिका","सुवर्ण गाउँपालिका","विश्रामपुर गाउँपालिका"]],
				["पर्सा",["बिरगंज महानगरपालिका","पोखरिया नगरपालिका","बहुदरमाई नगरपालिका","पर्सागढी नगरपालिका","ठोरी गाउँपालिका","जगरनाथपुर गाउँपालिका","धोबीनी गाउँपालिका","छिपहरमाई गाउँपालिका","पकाहा मैनपुर गाउँपालिका","बिन्दबासिनी गाउँपालिका","सखुवा प्रसौनी गाउँपालिका","पटेर्वा सुगौली गाउँपालिका","कालिकामाई गाउँपालिका","जिरा भवानी गाउँपालिका"]]
			  ],
			  //state 3 starts
			  [
			  	["सिन्धुली",["कमलामाई नगरपालिका","दुधौली नगरपालिका","गोलन्जर गाउँपालिका","घ्याङलेख गाउँपालिका","तीनपाटन गाउँपालिका","फिक्कल गाउँपालिका","मरिण गाउँपालिका","सुनकोशी गाउँपालिका","हरिहरपुरगढी गाउँपालिका"]],
				["रामेछाप",["मन्थली नगरपालिका","रामेछाप नगरपालिका","उमाकुण्ड गाउँपालिका","खाँडादेवी गाउँपालिका","गोकुलगङ्गा गाउँपालिका","दोरम्बा गाउँपालिका","लिखु तामाकोशी गाउँपालिका","सुनापती गाउँपालिका"]],
				["दोलखा",["जिरी नगरपालिका","भिमेश्वर नगरपालिका","कालिन्चोक गाउँपालिका","गौरीशङ्कर गाउँपालिका","तामाकोशी गाउँपालिका","मेलुङ्ग गाउँपालिका","विगु गाउँपालिका","वैतेश्वर गाउँपालिका","शैलुङ्ग गाउँपालिका"]],
				["सिन्धुपाल्चोक",["चौतारा साँगाचोकगढी नगरपालिका","बाह्रविसे नगरपालिका","मेलम्ची नगरपालिका","ईन्द्रावती गाउँपालिका","जुगल गाउँपालिका","पाँचपोखरी थाङपाल गाउँपालिका","बलेफी गाउँपालिका","भोटेकोशी गाउँपालिका","लिसङ्खु पाखर गाउँपालिका","सुनकोशी गाउँपालिका","हेलम्बु गाउँपालिका","त्रिपुरासुन्दरी गाउँपालिका"]],
				["काभ्रेपलान्चोक",["धुलिखेल नगरपालिका","बनेपा नगरपालिका","पनौती नगरपालिका","पाँचखाल नगरपालिका","नमोबुद्ध नगरपालिका","मण्डनदेउपुर नगरपालिका","खानीखोला गाउँपालिका","चौंरीदेउराली गाउँपालिका","तेमाल गाउँपालिका","बेथानचोक गाउँपालिका","भुम्लु गाउँपालिका","महाभारत गाँउपालिका","रोशी गाउँपालिका"]],
				["ललितपुर",["ललितपुर महानगरपालिका","गोदावरी नगरपालिका","महालक्ष्मी नगरपालिका","कोन्ज्योसोम गाउँपालिका","बागमती गाउँपालिका","महाङ्काल गाउँपालिका"]],
				["भक्तपुर",["चाँगुनारायण नगरपालिका","भक्तपुर नगरपालिका","मध्यपुर थिमी नगरपालिका","सूर्यविनायक नगरपालिका"]],
				["काठमाण्डौ",["काठमाण्डौं महानगरपालिका","कागेश्वरी मनोहरा नगरपालिका","कीर्तिपुर नगरपालिका","गोकर्णेश्वर नगरपालिका","चन्द्रागिरी नगरपालिका","टोखा नगरपालिका","तारकेश्वर नगरपालिका","दक्षिणकाली नगरपालिका","नागार्जुन नगरपालिका","बुढानिलकण्ठ नगरपालिका","शङ्खरापुर नगरपालिका"]],
				["नुवाकोट",["विदुर नगरपालिका","बेलकोटगढी नगरपालिका","ककनी गाउँपालिका","किस्पाङ गाउँपालिका","तादी गाउँपालिका","तारकेश्वर गाउँपालिका","दुप्चेश्वर गाउँपालिका","पञ्चकन्या गाउँपालिका","लिखु गाउँपालिका","म्यगङ गाउँपालिका","शिवपुरी गाउँपालिका","सुर्यगढी गाउँपालिका"]],
				["रसुवा",["उत्तरगया गाउँपालिका","कालिका गाउँपालिका","गोसाईकुण्ड गाउँपालिका","नौकुण्ड गाउँपालिका","आमाछोदिङमो गाउँपालिका"]],
				["धादिङ",["धुनीबेंशी नगरपालिका","निलकण्ठ नगरपालिका","खनियाबास गाउँपालिका","गजुरी गाउँपालिका","गल्छी गाउँपालिका","गङ्गाजमुना गाउँपालिका","ज्वालामूखी गाउँपालिका","थाक्रे गाउँपालिका","नेत्रावती डबजोङ गाउँपालिका","बेनीघाट रोराङ्ग गाउँपालिका","रुवी भ्याली गाउँपालिका","सिद्धलेक गाउँपालिका","त्रिपुरासुन्दरी गाउँपालिका"]],
				["मकवानपुर",["हेटौडा उपमहानगरपालिका","थाहा नगरपालिका","इन्द्रसरोबर गाउँपालिका","कैलाश गाउँपालिका","बकैया गाउँपालिका","बाग्मति गाउँपालिका","भिमफेदी गाउँपालिका","मकवानपुरगढी गाउँपालिका","मनहरी गाउँपालिका","राक्सिराङ्ग गाउँपालिका"]],
				["चितवन",["भरतपुर महानगरपालिका","कालिका नगरपालिका","खैरहनी नगरपालिका","माडी नगरपालिका","रत्ननगर नगरपालिका","राप्ती नगरपालिका","इच्छाकामना गाउँपालिका"]]
			   ],
			  //state 4 starts
			  [
			  	["गोरखा",["गोरखा नगरपालिका","पालुङटार नगरपालिका","बारपाक सुलिकोट गाउँपालिका","सिरानचोक गाउँपालिका","अजिरकोट गाउँपालिका","आरूघाट गाउँपालिका","गण्डकी गाउँपालिका","चुमनुव्री गाउँपालिका","धार्चे गाउँपालिका","भिमसेनथापा गाउँपालिका","शहिद लखन गाउँपालिका"]],
				["लमजुङ",["बेसीशहर नगरपालिका","मध्यनेपाल नगरपालिका","रार्इनास नगरपालिका","सुन्दरबजार नगरपालिका","क्व्होलासोथार गाउँपालिका","दूधपोखरी गाउँपालिका","दोर्दी गाउँपालिका","मर्स्याङदी गाउँपालिका"]],
				["तनहुँ",["शुक्लागण्डकी नगरपालिका","आँबुखैरेनी गाउँपालिका","ऋषिङ्ग गाउँपालिका","घिरिङ गाउँपालिका","देवघाट गाउँपालिका","म्याग्दे गाउँपालिका","वन्दिपुर गाउँपालिका"]],
				["स्याङजा",["गल्याङ नगरपालिका","चापाकोट नगरपालिका","पुतलीबजार नगरपालिका","भीरकोट नगरपालिका","वालिङ नगरपालिका","अर्जुनचौपारी गाउँपालिका","आँधिखोला गाउँपालिका","कालीगण्डकी गाउँपालिका","फेदीखोला गाउँपालिका","बिरुवा गाउँपालिका","हरिनास गाउँपालिका"]],
				["कास्की",["पोखरा महानगरपालिका","अन्नपूर्ण गाउँपालिका","माछापुच्छ्रे गाउँपालिका","मादी गाउँपालिका","रूपा गाउँपालिका"]],
				["मनाङ",["चामे गाउँपालिका","नार्पा भूमि गाउँपालिका","नासोँ गाउँपालिका","मनाङ ङिस्याङ गाउँपालिका"]],
				["मुस्ताङ",["घरपझोङ गाउँपालिका","थासाङ गाउँपालिका","लो-घेकर दामोदरकुण्ड गाउँपालिका","लोमन्थाङ गाउँपालिका","वारागुङ मुक्तिक्षेत्र गाउँपालिका"]],
				["म्याग्दी",["बेनी नगरपालिका","अन्नपुर्ण गाउँपालिका","धवलागिरी गाउँपालिका","मंगला गाउँपालिका","मालिका गाउँपालिका","रघुगंगा गाउँपालिका"]],
				["पर्वत",["कुश्मा नगरपालिका","फलेवास नगरपालिका","जलजला गाउँपालिका","पैयूं गाउँपालिका","महाशिला गाउँपालिका","मोदी गाउँपालिका","विहादी गाउँपालिका"]],
				["वाग्लुङ",["बागलुङ नगरपालिका","गल्कोट नगरपालिका","जैमूनी नगरपालिका","ढोरपाटन नगरपालिका","वरेङ गाउँपालिका","काठेखोला गाउँपालिका","तमानखोला गाउँपालिका","ताराखोला गाउँपालिका","निसीखोला गाउँपालिका","वडिगाड गाउँपालिका"]],
				["नवलपरासी (बर्दघाट सुस्ता पूर्व)",["कावासोती नगरपालिका","गैडाकोट नगरपालिका","देवचुली नगरपालिका","मध्यविन्दु नगरपालिका","बौदीकाली गाउँपालिका","बुलिङटार गाउँपालिका","विनयी त्रिवेणी गाउँपालिका","हुप्सेकोट गाउँपालिका"]]
			  ],
			  //state 5 starts
			  [
			  	["गुल्मी",["मुसिकोट नगरपालिका","रेसुङ्गा नगरपालिका","ईस्मा गाउँपालिका","कालीगण्डकी गाउँपालिका","गुल्मी दरबार गाउँपालिका","सत्यवती गाउँपालिका","चन्द्रकोट गाउँपालिका","रुरुक्षेत्र गाउँपालिका","छत्रकोट गाउँपालिका","धुर्कोट गाउँपालिका","मदाने गाउँपालिका","मालिका गाउँपालिका"]],
				["पाल्पा",["रामपुर नगरपालिका","तानसेन नगरपालिका","निस्दी गाउँपालिका","पूर्वखोला गाउँपालिका","रम्भा गाउँपालिका","माथागढी गाउँपालिका","तिनाउ गाउँपालिका","बगनासकाली गाउँपालिका","रिब्दिकोट गाउँपालिका","रैनादेवी छहरा गाउँपालिका"]],
				["रुपन्देही",["बुटवल उपमहानगरपालिका","देवदह नगरपालिका","लुम्बिनी सांस्कृतिक नगरपालिका","सैनामैना नगरपालिका","सिद्धार्थनगर नगरपालिका","तिलोत्तमा नगरपालिका","गैडहवा गाउँपालिका","कन्चन गाउँपालिका","कोटहीमाई गाउँपालिका","मर्चवारी गाउँपालिका","मायादेवी गाउँपालिका","ओमसतिया गाउँपालिका","रोहिणी गाउँपालिका","सम्मरीमाई गाउँपालिका","सियारी गाउँपालिका","शुद्धोधन गाउँपालिका"]],
				["कपिलबस्तु",["कपिलवस्तु नगरपालिका","बुद्धभुमी नगरपालिका","शिवराज नगरपालिका","महाराजगंज नगरपालिका","कृष्णनगर नगरपालिका","बाणगंगा नगरपालिका","मायादेवी गाउँपालिका","यसोधरा गाउँपालिका","सुद्धोधन गाउँपालिका","विजयनगर गाउँपालिका"]],
				["अर्घाखाँची",["सन्धिखर्क नगरपालिका","शितगंगा नगरपालिका","भूमिकास्थान नगरपालिका","छत्रदेव गाउँपालिका","पाणिनी गाउँपालिका","मालारानी गाउँपालिका"]],
				["प्यूठान",["प्यूठान नगरपालिका","स्वर्गद्वारी नगरपालिका","गौमुखी गाउँपालिका","माण्डवी गाउँपालिका","सरुमारानी गाउँपालिका","मल्लरानी गाउँपालिका","नौवहिनी गाउँपालिका","झिमरुक गाउँपालिका","ऐरावती गाउँपालिका"]],
				["रोल्पा",["रोल्पा नगरपालिका","त्रिवेणी गाउँपालिका","परिवर्तन गाउँपालिका","माडी गाउँपालिका","रुन्टीगढी गाउँपालिका","लुङग्री गाउँपालिका","गंगादेव गाउँपालिका","सुनछहरी गाउँपालिका","सुनिल स्मृति गाउँपालिका","थवाङ गाउँपालिका"]],
				["रुकुम (पूर्वी भाग)",["पुथा उत्तरगंगा गाउँपालिका","भूमे गाउँपालिका","सिस्ने गाउँपालिका"]],
				["दाङ",["तुल्सीपुर उपमहानगरपालिका","घोराही उपमहानगरपालिका","लमही नगरपालिका","बंगलाचुली गाउँपालिका","दंगीशरण गाउँपालिका","गढवा गाउँपालिका","राजपुर गाउँपालिका","राप्ती गाउँपालिका","शान्तिनगर गाउँपालिका","बबई गाउँपालिका"]],
				["बाँके",["नेपालगंज उपमहानगरपालिका","कोहलपुर नगरपालिका","नरैनापुर गाउँपालिका","राप्ती सोनारी गाउँपालिका","बैजनाथ गाउँपालिका","खजुरा गाउँपालिका","डुडुवा गाउँपालिका","जानकी गाउँपालिका"]],
				["बर्दिया",["गुलरिया नगरपालिका","मधुवन नगरपालिका","राजापुर नगरपालिका","ठाकुरबाबा नगरपालिका","बाँसगढी नगरपालिका","बारबर्दिया नगरपालिका","बढैयाताल गाउँपालिका","गेरुवा गाउँपालिका"]],
				["नवलपरासी (बर्दघाट सुस्ता पश्चिम)",["बर्दघाट नगरपालिका","रामग्राम नगरपालिका","सुनवल नगरपालिका","सुस्ता गाउँपालिका","पाल्हीनन्दन गाउँपालिका","प्रतापपुर गाउँपालिका","सरावल गाउँपालिका"]]
			  ],
			  //state 6 starts
			  [
			  	["रुकुम (पश्चिम भाग)",["मुसिकोट नगरपालिका","चौरजहारी नगरपालिका","आठबिसकोट नगरपालिका","बाँफिकोट गाउँपालिका","त्रिवेणी गाउँपालिका","सानी भेरी गाउँपालिका"]],
				["सल्यान",["शारदा नगरपालिका","बागचौर नगरपालिका","बनगाड कुपिण्डे नगरपालिका","कालिमाटी गाउँपालिका","त्रिवेणी गाउँपालिका","कपुरकोट गाउँपालिका","छत्रेश्वरी गाउँपालिका","सिद्ध कुमाख गाउँपालिका","कुमाख गाउँपालिका","दार्मा गाउँपालिका"]],
				["सुर्खेत",["बीरेन्द्रनगर नगरपालिका","भेरीगंगा नगरपालिका","गुर्भाकोट नगरपालिका","पञ्चपुरी नगरपालिका","लेकवेशी नगरपालिका","चौकुने गाउँपालिका","बराहताल गाउँपालिका","चिङ्गाड गाउँपालिका","सिम्ता गाउँपालिका"]],
				["दैलेख",["नारायण नगरपालिका","दुल्लु नगरपालिका","चामुण्डा विन्द्रासैनी नगरपालिका","आठबीस नगरपालिका","भगवतीमाई गाउँपालिका","गुराँस गाउँपालिका","डुंगेश्वर गाउँपालिका","नौमुले गाउँपालिका","महावु गाउँपालिका","भैरवी गाउँपालिका","ठाँटीकाँध गाउँपालिका"]],
				["जाजरकोट",["भेरी नगरपालिका","छेडागाड नगरपालिका","नलगाड नगरपालिका","बारेकोट गाउँपालिका","कुसे गाउँपालिका","जुनीचाँदे गाउँपालिका","शिवालय गाउँपालिका"]],
				["डोल्पा",["ठूली भेरी नगरपालिका","त्रिपुरासुन्दरी नगरपालिका","डोल्पो बुद्ध गाउँपालिका","शे फोक्सुन्डो गाउँपालिका","जगदुल्ला गाउँपालिका","मुड्केचुला गाउँपालिका","काईके गाउँपालिका","छार्का ताङसोङ गाउँपालिका"]],
				["जुम्ला",["चन्दननाथ नगरपालिका","कनकासुन्दरी गाउँपालिका","सिंजा गाउँपालिका","हिमा गाउँपालिका","तिला गाउँपालिका","गुठिचौर गाउँपालिका","तातोपानी गाउँपालिका","पातारासी गाउँपालिका"]],
				["कालिकोट",["खाँडाचक्र नगरपालिका","रास्कोट नगरपालिका","तिलागुफा नगरपालिका","पचालझरना गाउँपालिका","सान्नी त्रिवेणी गाउँपालिका","नरहरिनाथ गाउँपालिका","शुभ कालीका गाउँपालिका","महावै गाउँपालिका","पलाता गाउँपालिका"]],
				["मुगु",["छायाँनाथ रारा नगरपालिका","मुगुम कार्मारोंग गाउँपालिका","सोरु गाउँपालिका","खत्याड गाउँपालिका"]],
				["हुम्ला",["सिमकोट गाउँपालिका","नाम्खा गाउँपालिका","खार्पुनाथ गाउँपालिका","सर्केगाड गाउँपालिका","चंखेली गाउँपालिका","अदानचुली गाउँपालिका","ताँजाकोट गाउँपालिका"]]
			  ],
			  //state 7 starts
			  [
			  	["बाजुरा",["बडीमालिका नगरपालिका","त्रिवेणी नगरपालिका","बुढीगंगा नगरपालिका","बुढीनन्दा नगरपालिका","गौमुल गाउँपालिका","जगन्‍नाथ गाउँपालिका","स्वामीकार्तिक खापर गाउँपालिका","खप्तड छेडेदह गाउँपालिका","हिमाली गाउँपालिका"]],
				["बझाङ",["जयपृथ्वी नगरपालिका","बुंगल नगरपालिका","तलकोट गाउँपालिका","मष्टा गाउँपालिका","खप्तडछान्ना गाउँपालिका","थलारा गाउँपालिका","वित्थडचिर गाउँपालिका","सूर्मा गाउँपालिका","छबिसपाथिभेरा गाउँपालिका","दुर्गाथली गाउँपालिका","केदारस्युँ गाउँपालिका","साइपाल गाउँपालिका"]],
				["अछाम",["मंगलसेन नगरपालिका","कमलबजार नगरपालिका","साँफेबगर नगरपालिका","पन्चदेवल विनायक नगरपालिका","चौरपाटी गाउँपालिका","मेल्लेख गाउँपालिका","बान्निगढी जयगढ गाउँपालिका","रामारोशन गाउँपालिका","ढकारी गाउँपालिका","तुर्माखाँद गाउँपालिका"]],
				["डोटी",["दिपायल सिलगढी नगरपालिका","शिखर नगरपालिका","पूर्वीचौकी गाउँपालिका","बडीकेदार गाउँपालिका","जोरायल गाउँपालिका","सायल गाउँपालिका","आदर्श गाउँपालिका","के.आई.सिं. गाउँपालिका","बोगटान फुड्सिल गाउँपालिका"]],
				["कैलाली",["धनगढी उपमहानगरपालिका","टिकापुर नगरपालिका","घोडाघोडी नगरपालिका","लम्कीचुहा नगरपालिका","भजनी नगरपालिका","गोदावरी नगरपालिका","गौरीगंगा नगरपालिका","जानकी गाउँपालिका","बर्दगोरिया गाउँपालिका","मोहन्याल गाउँपालिका","कैलारी गाउँपालिका","जोशीपुर गाउँपालिका","चुरे गाउँपालिका"]],
				["कञ्चनपुर",["भीमदत्त नगरपालिका","पुर्नवास नगरपालिका","वेदकोट नगरपालिका","महाकाली नगरपालिका","शुक्लाफाँटा नगरपालिका","बेलौरी नगरपालिका","कृष्णपुर नगरपालिका","बेलडाडी गाउँपालिका","लालझाडी गाउँपालिका"]],
				["डडेलधुरा",["अमरगढी नगरपालिका","परशुराम नगरपालिका","आलिताल गाउँपालिका","भागेश्वर गाउँपालिका","नवदुर्गा गाउँपालिका","अजयमेरु गाउँपालिका","गन्यापधुरा गाउँपालिका"]],
				["बैतडी",["दशरथचन्द नगरपालिका","पाटन नगरपालिका","मेलौली नगरपालिका","पुर्चौडी नगरपालिका","सुर्नया गाउँपालिका","सिगास गाउँपालिका","शिवनाथ गाउँपालिका","पञ्चेश्वर गाउँपालिका","दोगडाकेदार गाउँपालिका","डीलासैनी गाउँपालिका"]],
				["दार्चुला",["महाकाली नगरपालिका","शैल्यशिखर नगरपालिका","मालिकार्जुन गाउँपालिका","अपिहिमाल गाउँपालिका","दुहुँ गाउँपालिका","नौगाड गाउँपालिका","मार्मा गाउँपालिका","लेकम गाउँपालिका","ब्याँस गाउँपालिका"]],
			  ]
			];
				
	$("#state").change(function(){	
		state=parseInt($(this).prop('selectedIndex')-1);
		//alert($(this).children("option:selected").val());	
		$('#district option,#mun option').remove();
		$('#district').append(new Option("-- Please Select District--"));
		for (var i = 0; i < data[state].length; i++) {
		 	$('#district').append(new Option(data[state][i][0]));
		}
	});//state change ends
	$("#district").change(function(){
		var district=parseInt($(this).prop('selectedIndex')-1);
		//alert($(this).children("option:selected").val());	
		$('#mun option').remove();
		$('#mun').append(new Option("-- Please Select MUN/ VDC --"));	
		for (var j = 0; j < data[state][district][1].length; j++) {
		 	$('#mun').append(new Option(data[state][district][1][j]));
		}
	});//state change ends
/************ get geo location ***********/
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function(position){
		var positionInfo = position.coords.latitude + ","+position.coords.longitude;
		//$("#mail").attr("href","mailto:it@neco.com.np?subject=LongLat&body=https://www.google.com/maps/place/"+positionInfo);
		$( "#mail" ).click(function() {
		  if($("#branch").val()==''){
		  	alert("please Type branch name");
			$("#branch").focus();	
		  }
		  else{
		  	var stateName=$("#state").children("option:selected").val();
			var districtName=$("#district").children("option:selected").val();
			var munName=$("#mun").children("option:selected").val();
			var wardNo=$("#ward").val();
			var zoneName=$("#zone").children("option:selected").val();
			var branchName=$("#branch").val();
			
			
			
		  	$("#mail").attr('href','mailto:user@gmail.com?subject=Branch_Google_MaP&body=<table width=50% border=1><tr><td>'+branchName+'</td><td>'+stateName+'</td><td>'+districtName+'</td><td>'+munName+'</td><td>'+wardNo+'</td><td>'+zoneName+'</td></tr></table><br><br><a href=https://www.google.com/maps/place/'+positionInfo+'>Click here for Google Map</a>');
		  }
		});
	});
	} else{
		alert("Sorry, your browser does not support HTML5 geolocation.");
	}
});
</script>
<!---end script for select district zone and municipality-->
	
</body>



</html>

