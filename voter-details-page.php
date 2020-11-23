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

            
              

                
                
                <div class="main-container" style="background:#eee;">

                    <div class="voter-details-container animate__slideInLeft" style="animation-duration:0.6s;">
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
                        <div>Citizenship Front: <img src="register/<?php echo $row1 ['img'];?>" alt="" width="350px" height="300px"></div>
                        <div>Citizenship Back: <img src="register/<?php echo $row1 ['citizenship_back'];?>" alt="" width="350px" height="300px"></div>
                    </div>
                    <div class="right-container animate__slideInRight " style="animation-duration:0.6s;">
                        <form action="" method="POST">
                            <div>Please Enter the Secret ID to Vote</div>
                            <div>
                                <label for="">Secret Voter ID</label>
                                <input name="secret_voter_id" type="text">
                            </div>
                            
                            <div>
                                <button class="vote-now" name = "vote-now">VOTE - NOW</button>

                            </div>
                            <?php include ('login_query2.php');?>
                        </form>

                    </div>

                </div>

              
                
    

        
</body>
</html>
