<?php include ('head2.php');?>


<body>

    <div class="container login-box col-md-3" style="margin-top:200px;background-color:white;">
        
                <div class="container login-panel panel panel-default">
                    <div class="panel-heading">
                    <br>
                        <center><div class="login-box-heading"><i class="fas fa-user" style="font-size:30px;"></i> Admin</center>
                    </div>
                    <div class="container panel-body">
                        <form role="form" method = "post" enctype = "multipart/form-data">
                            <fieldset>
							
                                <div class="form-group">
									<label for = "username" >Username</label>
										<input class="form-control" placeholder="Please Enter your Username" name="username" type="text" autofocus>
                                </div>
								
                                <div class="form-group">
									<label for = "username" >Password</label>
										<input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                             
                              
                                <button class="btn  btn-success" style="margin-left:40%; padding:5px 10px;" name = "login">Login</a>
								
								
                            </fieldset>
							
									<?php include ('login_query.php');?>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>

  <?php include ('script.php');?>
  <?php include ('navbar.php');?>


</body>

</html>
