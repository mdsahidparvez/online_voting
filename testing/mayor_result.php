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
<div class="container ">


            <table class="table table-striped table-bordered table-hover ">
					<thead>
						<td style = "width:600px;" class = "alert alert-success">Candidate for Mayor</td>
						<td style = "width:200px;"class = "alert alert-success">Image</td>
						<td class = "alert alert-success">Total</td>
					
					</thead>
					<?php
						
							$query = $conn->query("SELECT * FROM candidate WHERE position = 'Mayor'");
						while($fetch = $query->fetch_array())
						{	  

                            include ('checkcondition.php');
							
					?>
					<tbody> 
						<td><?php echo $fetch ['firstname']. " ".$fetch ['lastname'];?></td>
						<td><img src = "../admin/<?php echo $fetch ['img'];?>" style = "width:40px; height:40px; border-radius:500px; " >
						<td style = "width:20px; text-align:center"><button class = "btn btn-primary"disabled><?php echo $count;?></button>	</td>
					<?php }?>
					</tbody>
					
					
			</table>
            <table class="table table-striped table-bordered table-hover ">
					<thead>
						<td style = "width:600px;"class = "alert alert-success">Deputy Mayor</td>
						<td style = "width:200px;" class = "alert alert-success">Image</td>
						<td class = "alert alert-success">Total</td>
					
					</thead>
					<?php
							$query = $conn->query("SELECT * FROM candidate WHERE position = 'Deputy Mayor'");
						while($fetch = $query->fetch_array())
						{
                             include ('checkcondition.php');

							
					?>
					<tbody> 
						<td><?php echo $fetch ['firstname']. " ".$fetch ['lastname'];?></td>
						<td><img src = "../admin/<?php echo $fetch ['img'];?>" style = "width:40px; height:40px; border-radius:500px; " >

                      

						<td style = "width:20px; text-align:center"><button class = "btn btn-primary"disabled><?php echo  $count;?></button>	</td>
					<?php }?>
					</tbody>
					
					
			</table>
            



            
</div>  <!--close container-->           
					
</body>
</html>
