<?php  $page='resultpage'; include ('head.php'); ?>
<!--testingg------>
<?php
    require 'admin/dbcon.php';
    $query = $conn->query("SELECT *  FROM election where status='Active' ");
    while($row1 = $query->fetch_array()){
        $start_date=$row1['start_date'];
        $end_date=$row1['end_date'];

        $election_id=$row1['election_id'];
        date_default_timezone_set("Asia/Kathmandu");

        $start_date1=new DateTime($start_date);
        $end_date1=new DateTime($end_date);

        // echo "start date is $start_date";
        // echo "end date is $end_date";
        // date_default_timezone_set('UTC');

        // $currentDateTime=date('Y-m-d H:i:s');//get current date and time
        $currentDateTime=new DateTime();//get current date and time
        // print_r ($currentDateTime);
        // print_r($start_date1);



        //if scheduled end dateTime is less than current dateTime
        if ($end_date1<$currentDateTime){
            $conn->query ("UPDATE election SET status = 'completed'  WHERE election_id = '$election_id'")or die(mysql_error());


            
        }

    }
    
  




?>




<!-------end testing -------->



<body>
<div id="loading"></div>

	<link rel="stylesheet" href="register.css"> <!--css for registration form -->

	<?php include ('navbar.php'); ?>
    <?php include 'admin/dbcon.php'; ?>
    <?php 
        require 'admin/dbcon.php';

        if (isset($_POST['save'])){
            echo "<h1>Helloooo</h1>";
            die();

        }



    ?>
    <div class="container col-12  d-flex flex-wrap" style="margin-top:90px;background:#eaeaea;"> 
    <div class="title" style="text-align:center; font-size:30px; width:100%;text-transform: uppercase; font-weight:bold;">Election Results </div>
        <?php 
            require 'admin/dbcon.php';
            $bool = false;
            $query = $conn->query("SELECT * FROM  election  WHERE status='completed' ");
                while($row = $query->fetch_array()){
                    $election_id=$row['election_id'];
        ?>
            
            <div class="card" style="width: 18rem; margin: 30px;0 0 20px #d0d0d0">
                <img src="https://www.pngitem.com/pimgs/m/340-3408958_results-icons-results-icon-hd-png-download.png" class="card-img-top" style="border-radius:100%;" alt="...">
                <form method = "post" action="./testing/ward1_result.php" enctype = "multipart/form-data">	
                    <div class="card-body " style="display:flex;flex-wrap:wrap;flex-direction:column;justify-content:center; align-items:center;">
                      <div class="container" style="background:#000; color:#fff;padding:10px;display:flex; align-items:center;flex-direction:column;">
                        <label> Election ID </label>
                        <input readonly name="election_id" style="cursor:default; text-align:center;" value="<?php echo "$election_id"; ?>"></input>
                      </div>
                        <div class="form-group">
                            <label>Ward</label>
                            <select class = "form-control" name = "ward"  required="true">
                                <option value="">select your Ward </option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>

                                
                            </select>
                        </div>
                        <button name = "save" type="submit" class="btn btn-danger">View Result</button>
                    

                    </div>

                </form>

            </div>
                        
                <?php 
                    
                    // require 'edit_candidate_modal.php';
                ?>
        </tr>
        
        <?php } ?>
    </div>



