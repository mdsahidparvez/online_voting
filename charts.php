<?php
    $con=mysqli_connect("localhost","root", "", "voting");
    if($con){
        echo "connected";
    }
?>
<?php include "head.php"?>
<html>
  <head>
  
  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['candidate_id','voters_id'],
          <?php
          $sql = "SELECT * FROM votes where vote_id<55 and candidate_id>0";
          $fire = mysqli_query($con,$sql);
          while($result = mysqli_fetch_assoc($fire)){
            echo "['".$result['candidate_id']."',".$result['voters_id']."],";
          }
          ?>

         
        ]);

        var options = {'title':'Number of Faculty Specializations',
                'width':900,
                'height':600};

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <?php include "navbar.php" ?>
    <div class="container-fluid" style="height:100vh;width:100vw;background-color:white;">
    <div class="container text-center" id="piechart"></div>
    </div>
  </body>
</html>
