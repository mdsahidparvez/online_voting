<?php  $page='voter';include ('head.php');?>
<body>
    
    <div class="animate__animated animate__fadeInDown container login-box col-md-3 " id="login-box">
        <div class="container">
        <br>
            <div class="login-box-heading">
                <i class="fas fa-user" ></i> Voter 
            </div>
            <div class="container" >
                <form role="form" method = "post" enctype = "multipart/form-data">
                    <fieldset>
                    
                        <div class="form-group">
                            <label for = "username" >ID No.</label>
                                <input class="form-control" placeholder="Please Enter Voter's ID Number" name="idno" type="text" required = "required"autocomplete="off"  autofocus>
                        </div>
                        
                        <div class="form-group">
                            <label for = "username" >Password</label>
                                <input class="form-control" placeholder="Password" name="password" type="password" required = "required">
                        </div>
                    
                    
                        <button class=" btn btn-success" style="margin-left:40%; padding:5px 10px;" name = "login">Log In</a>
                        
                        
                    </fieldset>
                    
                            <?php include ('login_query.php');?>
                </form>
               <div class="text-center" style="margin:5px;"> <h6><b>Note:</b> You can  vote  only once </h6></div>
            </div>
        </div>
    </div>
        
<?php include ('navbar.php');?>

<!-- <div class="  countdown float-right animate__animated animate__zoomIn" style="animation-duration:1.2s;"><h6>Voting Ends in</h6><p  id="demo"></p></div> -->
<?php include ('script.php');?>


<!--testing ----->
<?php
    $query = $conn->query("SELECT *  FROM election where status='Active' ");
    while($row1 = $query->fetch_array()){
        $start_date=$row1['start_date'];
        $end_date=$row1['end_date'];

    }
    date_default_timezone_set("Asia/Kathmandu");

    $start_date1=new DateTime($start_date);
    $end_date1=new DateTime($end_date);

    echo "start date is $start_date";
    echo "end date is $end_date";
    // date_default_timezone_set('UTC');

    // $currentDateTime=date('Y-m-d H:i:s');//get current date and time
    $currentDateTime=new DateTime();//get current date and time
    print_r ($currentDateTime);
    print_r($start_date1);



    //if scheduled start dateTime is greater than current dateTime
    if ($start_date1>$currentDateTime){
        echo"it is greater";
        echo"<script>";
            // echo'document.getElementById("demo").innerHTML = "EXPIRED";';
            echo 'document.getElementById("login-box").innerHTML = "<h1>You cannot Vote Voting Period has EXPIRED.</h1>"; ';

        echo "</script>";
    }
    //if scheduled end dateTime is greater than current dateTime
    if ($end_date1<$currentDateTime){
        echo "it is less";
        echo"<script>";
        // echo'document.getElementById("demo").innerHTML = "EXPIRED";';
        echo 'document.getElementById("login-box").innerHTML = "<h1>You cannot Vote Voting Period has EXPIRED.</h1>"; ';

        echo "</script>";
    }
    // else{
    //     echo "No election is scheduled yet";
    //     echo"<script>";
    //     echo'document.getElementById("demo").innerHTML = "EXPIRED";';
    //     echo 'document.getElementById("login-box").innerHTML = "<h1>No election is scheduled yet.</h1>"; ';

    //     echo "</script>";

    // }





?>




<!--end testing--->
</body>







<!-- <script>// countdown timer
    

    
// Set the date we're counting down to
var countDownDate = new Date("Oct 30, 2021 20:52:25").getTime();
console.log(countDownDate);

// Update the count down every 1 second
var x = setInterval(function() {
  
  // Get today's date and time
  var now = new Date().getTime();
  console.log("now time is"+ now);

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
    document.getElementById("login-box").innerHTML = "<h1>You cannot Vote Voting Period has EXPIRED.</h1>";

  }
  
}, 1000);
 


</script> -->

</html>
