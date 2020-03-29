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

<div class="  countdown float-right"><h6>Voting Ends in</h6><p  id="demo"></p></div>
<?php include ('script.php');?>
</body>





<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);

date_default_timezone_set("Asia/Kathmandu");

/* Query a time server (C) 1999-09-29, Ralf D. Kloth (QRQ.software) <ralf at qrq.de> */
function query_time_server ($timeserver, $socket)
{
    $fp = fsockopen($timeserver,$socket,$err,$errstr,5);
        # parameters: server, socket, error code, error text, timeout
    if($fp)
    {
        fputs($fp, "\n");
        $timevalue = fread($fp, 49);
        fclose($fp); # close the connection
    }
    else
    {
        $timevalue = " ";
    }

    $ret = array();
    $ret[] = $timevalue;
    $ret[] = $err;     # error code
    $ret[] = $errstr;  # error text
    return($ret);
} # function query_time_server


$timeserver = "ntp.pads.ufrj.br";
$timercvd = query_time_server($timeserver, 37);

//if no error from query_time_server
if(!$timercvd[1])
{
    $timevalue = bin2hex($timercvd[0]);
    $timevalue = abs(HexDec('7fffffff') - HexDec($timevalue) - HexDec('7fffffff'));
    $tmestamp = $timevalue - 2208988800; # convert to UNIX epoch time stamp
    $datum = date("Y-m-d (D) H:i:s",$tmestamp - date("Z",$tmestamp)); /* incl time zone offset */
    $doy = (date("z",$tmestamp)+1);

    echo "Time check from time server ",$timeserver," : [<font color=\"red\">",$timevalue,"</font>]";
    echo " (seconds since 1900-01-01 00:00.00).<br>\n";
    echo "The current date and universal time is ",$datum," UTC. ";
    echo "It is day ",$doy," of this year.<br>\n";
    echo "The unix epoch time stamp is $tmestamp.<br>\n";


    echo date("d/m/Y H:i:s", $tmestamp);
}
else
{
    echo "Unfortunately, the time server $timeserver could not be reached at this time. ";
    echo "$timercvd[1] $timercvd[2].<br>\n";
}




?>



<script>
    

    
// Set the date we're counting down to
var countDownDate = new Date("Mar 30, 2020 20:52:25").getTime();

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
