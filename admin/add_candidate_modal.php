<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>Add Candidate</center>
						</div>    
					</div>
				</h4>
			</div>
										
										
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<div class="form-group">
						<label>Position</label>
						<select class = "form-control" name = "position" required="true">
								<option></option>
								<option>Mayor</option>
								<option>Deputy Mayor</option>
								<option>Ward Chairperson</option>
								<option>Member</option>
								<option>Woman Member</option>
								<option>Dalit Woman Member</option>
							
							</select>
					</div>

										
					<div class="form-group">
						<label>Firstname</label>
							<input class="form-control" type ="text" name = "firstname" placeholder="Please enter firstname" required="true">
					</div>
					<div class="form-group">
						<label>Lastname</label>
							<input class="form-control"  type = "text" name = "lastname" placeholder="Please enter lastname" required="true">
					</div>
											
					<div class="form-group">
						<label>Party Name</label>
							<select class = "form-control" name = "party_name" required="true">
								<option></option>
								<option>Nepal Communist Party</option>
								<option>Nepali Congress</option>
								<option>Rastriya Janata Party</option>
								<option>Samajbadi Party</option>
							</select>
					</div>
															
					<div class="form-group">
						<label>Gender</label>
							<select class = "form-control" name = "gender" required="true">
								<option></option>
								<option>Male</option>
								<option>Female</option>
							</select>
					</div>
											
											
					<div class="form-group">
                        <label>Party Logo</label>
						<input type="file" name="image"required> 
                    </div>

					<div class="form-group">
						<label>Ward</label>
							<select class = "form-control" name = "ward" required="true">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>

							</select>
					</div>
						<button name = "save" type="submit" class="btn btn-primary">Save Data</button>
				</form>  
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
										
										
										
										
			<?php 
				require_once 'dbcon.php';
				
				if (isset ($_POST ['save'])){
					$position=$_POST['position'];
					$firstname=$_POST['firstname'];
					$lastname=$_POST['lastname'];
					$party_name=$_POST['party_name'];
					$gender=$_POST['gender'];
					$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name= addslashes($_FILES['image']['name']);
					$image_size= getimagesize($_FILES['image']['tmp_name']);
		
					move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
					$location="upload/" . $_FILES["image"]["name"];
					$ward=$_POST['ward'];
					
					$conn->query("INSERT INTO candidate(position,firstname,lastname,party_name,gender,img,ward)values('$position','$firstname','$lastname','$party_name','$gender','$location','$ward')")or die(mysql_error());
				}						
			?>					
        </div>
                                   
<!-- /.modal-content -->
                                
	</div>
                               
<!-- /.modal-dialog -->
								
</div>