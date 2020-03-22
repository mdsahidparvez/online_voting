<?php include ('head.php');?>
<body>
    <div class="container login-box col-md-3" id="login-box">
        <div class="container">
            <div class="login-box-heading">
                <i class="fas fa-user" style="font-size:30px;"></i> voter 
            </div>
            <div class="container" >
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
                    
                    
                        <button class=" btn-success btn-block " name = "login">Login</a>
                        
                        
                    </fieldset>
                    
                            <?php include ('login_query.php');?>
                </form>
                <h6><b>Note:</b> You can  vote  only once </h6>
            </div>
        </div>
    </div>
        
<?php include ('navbar.php');?>

<div class="  countdown float-right"><h6>Voting Ends in</h6><p  id="demo"></p></div>
<?php include ('script.php');?>
</body>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Mar 20, 2020 20:52:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";

  }
}, 1000);


</script>
</html>
