<?php include ('head2.php');?>
<?php include("sess.php")?>
<body>
    
        <?php include ('side_bar.php');?>
   
	<form method = "POST" action = "vote_result.php">
    	<div class='container ' style="background-color:white; text-align:center;font-size:20px;padding:20px;font-weight:bolder;">WARD : <?php echo $row['ward'];?></div>
		<div class="col-lg-6">
	
                    <div class="panel panel-primary">
                        <div class="panel-heading"><center>
                            MAYOR</center>
                        </div>
                       
               
                        
                       
                       
                        <div class="panel-body">
						<?php
                            $vward= $row['ward'];//declearing voters ward retrieved from side_bar.php
							$query = $conn->query("SELECT * FROM `candidate` WHERE candidate.position = 'Mayor' ") or die(mysqli_errno());
							while($fetch = $query->fetch_array())
						{
						?>
                           <div id = "position">
							<img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px" class = "img">
							
							<center><button type="button" class="btn btn-primary btn-xs" style="margin-top:-90px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button></center>
							<center><input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "pres_id" class = "president"></center>
							</div>
                            
	
						<?php
							}
						?>
                        

						</div>
                       
                    </div>
     	</div>
				
				
				<div class="col-lg-6">
	
                    <div class="panel panel-primary">
                        <div class="panel-heading"><center>
							Deputy Mayor</center>
                        </div>
                        <div class="panel-body" style = "background-color:;">
						<?php
							$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Deputy Mayor'") or die(mysqli_errno());
							while($fetch = $query->fetch_array()){
						?>
		<div id = "position">
			<img class = "image-rounded" src = "admin/<?php echo $fetch['img']?>"style ="border-radius:6px;" height = "150px" width = "150px">
		<center><button type="button" class="btn btn-primary btn-xs" style="margin-top:-90px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button></center>
			<center><input type = "checkbox"  value = "<?php echo $fetch['candidate_id'] ?>" name = "vpinternal_id" class = "vpinternal"></center>
		</div>
						<?php
							}
						?>

						</div>
                       
                    </div>
                </div>
	
	
	
	<div class="col-lg-6">
	  <div class="panel panel-primary">
            <div class="panel-heading">
			<center>Ward Chairperson</center>
            </div>
            <div class="panel-body" style = "background-color:;">
				<?php
					$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Ward Chairperson' and ward=$vward") or die(mysqli_errno());
					while($fetch = $query->fetch_array())
					{
				?>
						<div id = "position">
							<img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px" class = "img">
						<center><button type="button" class="btn btn-primary btn-xs" style = "border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button></center>
							<center><input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "vpexternal_id" class = "vpexternal"></center>
						</div>
	
				<?php
					}
				?>
			</div>      
        </div>
     </div>
	<div class="col-lg-6">
	  <div class="panel panel-primary">
            <div class="panel-heading">
			<center>MEMBER</center>
            </div>
            <div class="panel-body" style = "background-color:;">
				<?php
					$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Member' and ward=$vward") or die(mysqli_errno());
					while($fetch = $query->fetch_array())
					{
				?>
						<div id = "position">
							<img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px" class = "img">
							<center><button type="button" class="btn btn-primary btn-xs" style = "border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button></center>
							<center><input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "secretary_id" class = "secretary"></center>
						</div>
	
				<?php
					}
				?>
			</div>      
        </div>
     </div>	
	
	<div class="col-lg-6">
	  <div class="panel panel-primary">
            <div class="panel-heading">
			<center>Woman Member</center>
            </div>
            <div class="panel-body" style = "background-color:;">
				<?php
					$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Woman Member'") or die(mysqli_errno());
					while($fetch = $query->fetch_array())
					{
				?>
						<div id = "position">
							<img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px" class = "img">
							<center><button type="button" class="btn btn-primary btn-xs" style = "border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button></center>
							<center><input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "auditor_id" class = "auditor"></center>
						</div>
	
				<?php
					}
				?>
			</div>      
        </div>
     </div>
	 <div class="col-lg-6">
	  <div class="panel panel-primary">
            <div class="panel-heading">
			<center>Dalit Woman Member</center>
            </div>
            <div class="panel-body" style = "background-color:;">
				<?php
					$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Dalit Woman Member'") or die(mysqli_errno());
					while($fetch = $query->fetch_array())
					{
				?>
						<div id = "position">
							<img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px" class = "img">
							<center><button type="button" class="btn btn-primary btn-xs" style = "border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button></center>
							<center><input type = "checkbox"  value = "<?php echo $fetch['candidate_id'] ?>" name = "treasurer_id" class = "treasurer"></center>
						</div>
	
				<?php
					}
				?>
			</div>      
        </div>
     </div>

		
		<center><button class = "btn btn-success ballot" type = "submit" name = "submit">Submit Ballot</button></center>
		</form>
</body>
<?php include ('script.php')?>
  
  <script type = "text/javascript">
		$(document).ready(function(){
			$(".president").on("change", function(){
				if($(".president:checked").length == 1)
					{
						$(".president").attr("disabled", "disabled");
						$(".president:checked").removeAttr("disabled");
					}
				else
					{
						$(".president").removeAttr("disabled");
					}
			});
			
			$(".vpinternal").on("change", function(){
				if($(".vpinternal:checked").length == 1)
					{
						$(".vpinternal").attr("disabled", "disabled");
						$(".vpinternal:checked").removeAttr("disabled");
					}
				else
					{
						$(".vpinternal").removeAttr("disabled");
					}
			});
			
			$(".vpexternal").on("change", function(){
				if($(".vpexternal:checked").length == 1)
					{
						$(".vpexternal").attr("disabled", "disabled");
						$(".vpexternal:checked").removeAttr("disabled");
					}
				else
					{
						$(".vpexternal").removeAttr("disabled");
					}
			});
			
			$(".secretary").on("change", function(){
				if($(".secretary:checked").length == 1)
					{
						$(".secretary").attr("disabled", "disabled");
						$(".secretary:checked").removeAttr("disabled");
					}
				else
					{
						$(".secretary").removeAttr("disabled");
					}
			});
			
			$(".auditor").on("change", function(){
				if($(".auditor:checked").length == 1)
					{
						$(".auditor").attr("disabled", "disabled");
						$(".auditor:checked").removeAttr("disabled");
					}
				else
					{
						$(".auditor").removeAttr("disabled");
					}
			});
			
			$(".treasurer").on("change", function(){
				if($(".treasurer:checked").length == 1)
					{
						$(".treasurer").attr("disabled", "disabled");
						$(".treasurer:checked").removeAttr("disabled");
					}
				else
					{
						$(".treasurer").removeAttr("disabled");
					}
				
			});
			$(".pio").on("change", function(){
				if($(".pio:checked").length == 1)
					{
						$(".pio").attr("disabled", "disabled");
						$(".pio:checked").removeAttr("disabled");
					}
				else
					{
						$(".pio").removeAttr("disabled");
					}
			});
			$(".busman").on("change", function(){
				if($(".busman:checked").length == 1)
				{
					$(".busman").attr("disabled", "disabled");
					$(".busman:checked").removeAttr("disabled");
				}
			else
				{
					$(".busman").removeAttr("disabled");
				}
			});
			$(".sgtarm").on("change", function(){
				if($(".sgtarm:checked").length == 1)
				{
					$(".sgtarm").attr("disabled", "disabled");
					$(".sgtarm:checked").removeAttr("disabled");
				}
			else
				{
					$(".sgtarm").removeAttr("disabled");
				}
			});
			$(".muse").on("change", function(){
				if($(".muse:checked").length == 1)
				{
					$(".muse").attr("disabled", "disabled");
					$(".muse:checked").removeAttr("disabled");
				}
			else
				{
					$(".muse").removeAttr("disabled");
				}
			});
			$(".escort").on("change", function(){
				if($(".escort:checked").length == 1)
				{
					$(".escort").attr("disabled", "disabled");
					$(".escort:checked").removeAttr("disabled");
				}
			else
				{
					$(".escort").removeAttr("disabled");
				}
			});
		});	
	</script>
</html>

