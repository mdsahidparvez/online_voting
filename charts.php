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
                'width':1300,
                'height':900};

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <?php include "navbar.php" ?>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
