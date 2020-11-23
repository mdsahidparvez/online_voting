<?php include ('session.php');?>
<?php include ('head.php');?>


<div id="wrapper">
        <?php include ('side_bar.php');?>

        <div id="page-wrapper" style="background:#ECEDF0;">
        
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        require 'dbcon.php';
        if (isset($_POST['schedule'])){
            $election_id=$_POST['election-id'];
            $start_date=$_POST['start-date'];
            $end_date=$_POST['end-date'];

            $conn->query("insert into election(election_id,start_date,end_date) VALUES('$election_id','$start_date','$end_date')");
            echo "<h2><p class=\"alert-success text-center\" ><strong>Success!</strong> Election scheduled successfully </p></h2>";

        }



    ?>

    <h3 class="page-header">Schedule Election</h3>
    <form class="schedule-form" role="form" method = "post" enctype = "multipart/form-data">
        
            <div class="form-group">
                <label for = "election-id" >Election ID</label>
                <input class="form-control"  name="election-id" type="text" required = "required" autocomplete="off"  autofocus>
            </div>
            
            <div class="form-group">
                <label for = "start-date" >Start Date</label>
                    <input class="form-control"  name="start-date" type="date" required = "required" autocomplete="off"  autofocus>
            </div>
            
            <div class="form-group">
                <label for = "end-date" >End Date</label>
                    <input class="form-control"  name="end-date" type="date" required = "required">
            </div>
        
        
            <button type="submit" class=" btn btn-success" style="margin-left:40%; padding:5px 10px;" name = "schedule">Schedule</a></button>
            
            
        
    </form>
    <div class="election-list-wrapper">
        <div class="title">List of Scheduled Elections</div>
        <table id="myTable" class="table table-bordered table-hover " >
            <thead>
                <tr>
                    <th>Election Id</th>
                    <th>Start date </th>
                    <th>End date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require 'dbcon.php';
                    
                    
                    $query = $conn->query("SELECT * FROM election  ORDER BY election_id DESC");
                    while($row1 = $query->fetch_array()){
                    $election_id=$row1['election_id'];
                ?>
            
                    <tr>
                    <td><?php echo $row1 ['election_id'];?></td>

                        <td><?php echo $row1 ['start_date']; ?></td>
                        
                        
                        <td><?php echo $row1 ['end_date'];?></td>

                        
                    </tr>
                
            <?php } ?>
            </tbody>
        </table>
    </div>
    
            

        </div>
            
    </div>
    <?php include ('script.php');?>

</body>
</html>