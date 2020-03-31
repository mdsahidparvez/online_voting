<?php include ('head.php');?>
<body>
    
  
            
    <?php include ('navbar.php');?>

    <div class="  countdown float-right"><h6>Voting Ends in</h6><p  id="demo"></p></div>
    <?php include ('script.php');?>


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="https://ichef.bbci.co.uk/images/ic/1024x576/p07snhjs.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="https://www.suwanee.com/Home/ShowPublishedImage/1122/636585425989330000" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="https://www.sachamber.org/wp-content/uploads/2019/06/Vote-Graphic-03.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>


    <div class="container-fluid maincont">
        <div class="row">
            <div class="text-center col-md-4">
                <h1>Are you ready to Vote ?</h1>
            </div>
            <div class=" col-md-4 " style="text-align:center;">
                <h1><a href="">Login to vote</a></h1>
                <h6>If you are already registered</h6>

            </div><div class=" col-md-4 " style="text-align:center;">
                <h1><a href="">Register</a></h1>

            </div>

        </div>


    </div>
</body>



<script>// countdown timer
    

    
// Set the date we're counting down to
var countDownDate = new Date("Mar 30, 2021 20:52:25").getTime();

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
