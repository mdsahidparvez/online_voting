<?php include ('../head.php');?>
<?php include ('decrypt_and_count.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

<div class="text-center"><h3>MAYOR</h3></div>
<table class="table table-hover" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Candidate_id</th>
      <th scope="col">Total Votes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Sa</td>
      <td>20</td>
      <td><?php echo $count1 ?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Santosh Giri</td>
      <td>7</td>
      <td><?php echo $count7 ?></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td >Larry the Bird</td>
      <td></td>
	  <td></td>
    </tr>
	<tr>
      <th scope="row">4</th>
      <td >Larry the Bird</td>
	  <td></td>
      <td></td>
    </tr>
  </tbody>
</table>


<div class="text-center"><h3>DEPUTY MAYOR</h3></div>
<table class="table table-hover" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Candidate_id</th>
      <th scope="col">Total Votes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Hari Khadka</td>
      <td>16</td>
      <td><?php echo $count16 ?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Sushila Poudel</td>
      <td>17</td>
      <td><?php echo $count17 ?></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td >Raj Shresth</td>
	  <td>18</td>
      <td><?php echo $count18 ?></td>
    </tr>
	<tr>
      <th scope="row">4</th>
      <td >Sabin Aryal</td>
	  <td>19</td>
      <td><?php echo $count19 ?></td>
    </tr>
  </tbody>
</table>




</body>
</html>

