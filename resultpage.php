<?php  $page='resultpage'; include ('head.php'); ?>
<body style="background:#eee;">
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
            $query = $conn->query("SELECT * FROM  election  ORDER BY start_date DESC");
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



