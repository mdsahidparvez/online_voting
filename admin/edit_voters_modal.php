<div class="modal fade" id="edit_voters<?php  echo $voters_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">         
												<div class="panel panel-primary">
													<div class="panel-heading">
														<center>Verify Voters Details</center>
													</div>    
												</div>
											</h4>
										</div>
										
										
                                        <div class="modal-body">
	
		
										
					
											<form action="update_voters.php?voter_id=<?php echo $voters_id; ?>" method = "post" >	
											  <input type="hidden" name="voters_id" value="<?php echo $row1['voters_id'] ?>">
											<div class="form-group">
												<label>ID Number</label>
												<input type = "text" class = "form-control" name = "id_number" value="<?php echo $row1 ['id_number']?>"	>												
											</div>
											
										
										
											<div class="form-group">
												<label>Firstname</label>
													<input class="form-control" type ="text" name = "firstname" required="true" value = "<?php echo $row1 ['firstname']?>">
											</div>
											<div class="form-group">
												<label>Lastname</label>
													<input class="form-control"  type = "text" name = "lastname" value = "<?php echo $row1 ['lastname']?>" required="true">
											</div>
											
											<!--<div class="form-group">
												<label>Municipality</label>
													<select class = "form-control" name = "year_level" required="true">
														<option><?php echo $row1 ['year_level']?></option>
														<option></option>
														<option>1st Year</option>
														<option>2nd Year</option>
														<option>3rd Year</option>
														<option>4th Year</option>
														
														
														
													
													</select>
											</div>	-->
											<div class="form-group">
											<a href="../register/<?php echo $row1 ['img']?>">Citizenship Photo</a>
											<img src="../register/<?php echo $row1 ['img']?>" style="width:300px;height:300px;" onclick="window.open(this.src)" alt="">
											
											</div>
											<div class="form-group">
												<label>Mobile </label>
													<input class="form-control"  type = "number" name = "mobile" value = "<?php echo $row1 ['mobile']?>" required="true">
											</div>
											<div class="form-group">
												<label>Email </label>
													<input class="form-control"  type = "email" name = "email" value = "<?php echo $row1 ['email']?>" required="true">
											</div>

											<div class="form-group">
												<label>Ward</label>
													<select class = "form-control" name = "ward"  required="true">
														<option><?php echo $row1 ['ward']?></option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														
													</select>
											</div>

											
											<div class="form-group">
												<label>Account</label>
													<select class = "form-control" name = "account">
														<option><?php echo $row1 ['account']?></option>
														<option></option>
														<option>Active</option>
														<option>Rejected</option>
																								
													</select>
											</div>
																					
											 
												 <button name = "done" type="submit" class="btn btn-primary">Save Data</button>
												 <button name = "cancel" type="reset" class="btn btn-success">Cancel All</button>




										 
										 </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           
                                        </div>										
										</form>
				
									</div>
									
								</div>
									</div>
                                    <!-- /.modal-content -->
                                
