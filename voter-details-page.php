<?php include ('head2.php');?>
<?php include("sess.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Vote</title>

    <link rel="stylesheet" href="css/voter-details-page.css">
</head>
<body>
    <div id="wrapper">
        <?php include ('side_bar.php');?>
    </div>
        <?php 
            require 'admin/dbcon.php';
            
            
            $query = $conn->query("SELECT * FROM voters where voters_id ='$_SESSION[voters_id]' ");
            $row1 = $query->fetch_array();
        ?>

            
              

                
                
                <div class="main-container">

                    <div class="voter-details-container">
                        <div class="title">Profile</div>
                        <div class="voter-photo"><img src="register/<?php echo $row1 ['photo'];?>" alt="" ></div>

                        <div>Name :  <?php echo $row1 ['firstname']." ". $row1 ['lastname'];?></div>
                        <div>id_number :   <?php echo $row1 ['id_number'];?></div>
                        <div>status : <?php echo $row1 ['status'];?></div>
                        <div>Account : <?php echo $row1 ['account'];?></div>
                        <div>DOB : <?php echo $row1 ['dob'];?></div>
                        <div>Mobile : <?php echo $row1 ['mobile'];?> </div>
                        <div>Email :<?php echo $row1 ['email'];?></div>
                        <div>Ward : <?php echo $row1 ['ward'];?></div>
                        <div>Citizenship : <img src="register/<?php echo $row1 ['img'];?>" alt="" width="350px" height="300px"></div>
                    </div>
                    <div class="right-container">
                        <form action="" method="POST">
                            <button class="vote-now" name = "vote-now">VOTE - NOW</button>
                            <?php include ('login_query2.php');?>
                        </form>

                    </div>

                </div>

              
                
    

        
</body>
</html>
