<?php include ('head.php');?>
<body>
<div class="container title">HAMRO VOTE <br> Online Voting Sytem for Nagarpalika</div>
           <div class="container"><a class="admin-link" href="register/index.php">REGISTER VOTER</a><a href="admin\index.php" class="admin-link"><i class="fas fa-user" style="font-size:30px;"></i> ADMIN</a><a href="index.php" class="voter-link"><i class="fas fa-user" style="font-size:30px;"></i>  Voter</a></div>
           <a   href="admin/index.php" style="background-color:white;color:black;font-size:20px;padding:5px;">Check Voter List</a>

    <div class="container">
        
        <div class="row">
		
           
            <div class="col-md-4 col-md-offset-4">
			
                <div class="login-box">
				
                    <div class="login-box-heading">
                    <i class="fas fa-user" style="font-size:30px;"></i> voter 
                    </div>
                    <div class="panel-body">
                        <form role="form" method = "post" enctype = "multipart/form-data">
                            <fieldset>
							
                                <div class="form-group">
									<label for = "username" >ID No.</label>
										<input class="form-control" placeholder="Please Enter Voter's ID Number" name="idno" type="text" required = "required" autofocus>
                                </div>
								
                                <div class="form-group">
									<label for = "username" >Password</label>
										<input class="form-control" placeholder="Password" name="password" type="password" required = "required">
                                </div>
                             
                              
                                <button class="btn btn-lg btn-success btn-block " name = "login">Login</a>
								
								
                            </fieldset>
							
									<?php include ('login_query.php');?>
                        </form>
                        <h4><b>Note:</b> <i>You can  vote / login only once</i> </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <?php include ('script.php');?>

</body>

</html>
