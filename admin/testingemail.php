<?php include ('session.php');?>
<?php include ('head.php');?>


<body>
    <div id="wrapper">
        <?php include ('side_bar.php');?>
        <div id="page-wrapper" style="margin-top:19px;">


            <?php 
                require 'dbcon.php';


                $query = $conn->query("SELECT * FROM voters where account='active' ORDER BY voters_id DESC");
                while($row1 = $query->fetch_array()){
                    $voters_email=$row1['email'];
                    if (isset($_POST['save'])){
                
                        $to_email = $voters_email;
                        $subject = $_POST['subject'];
                        $body = $_POST['body'];
                        $headers = $_POST['header'];
                
                        if (mail($to_email, $subject, $body, $headers)) {
                            echo "Email successfully sent to $to_email...";
                        } 
                    }


                }
            ?>




            <div class="container col-md-6" style="background-color:white;padding:50px;">
                <div class="text-center" style="padding:50px;"><h2>Send Email to all voters</h2></div>
                <form class="text-center"  method="post">
                    <!--<div class="form-group"><label for="">Enter email</label>
                    <input name="email" type="text">
                    </div>-->
                    <div class="form-group">
                    <label for="">Subject</label>
                    <input name="subject" type="text">
                    </div>
                    <div class="form-group"><label for="">Header</label>
                    <input name="header" type="text">
                    </div>
                    <div class="form-group">
                    <label for="">Message</label>
                    <input style="height:100px; width:200px;" name="body" type="text">
                    </div>

                    <input class="btn btn-success" name="save" type="submit">

                </form>
            </div>



        <!-- sending email to a specific voter-->

         <?php
            if (isset($_POST['save2'])){
                $email=$_POST['email'];

                $to_email = $email;
                $subject = "Simple Email Test via PHP";
                $body = $_POST['body'];
                $headers = $_POST['header'];

                if (mail($to_email, $subject, $body, $headers)) {
                    echo "<h2><p class=\"alert-success text-center\" ><strong>ERROR!</strong>Email successfully sent to $to_email...</p></h2>";
                } else {
                    echo "<h2><p class=\"alert-danger text-center\" ><strong>ERROR!</strong> Email sending failed </p></h2>";					

                }
            }
         ?>
            <div class="container col-md-6" style="background-color:white;padding:50px;">
                <div class="text-center" style="padding:50px;"><h2>Send Email to specific</h2></div>
                <form class="text-center"  method="post">
                    <div class="form-group"><label for="">Email</label>
                    <input name="email" type="text">
                    </div>
                    <div class="form-group"><label for="">Header</label>
                    <input name="header" type="text">
                    </div>
                    <div class="form-group">
                    <label for="">Message</label>
                    <input style="height:100px; width:200px;"name="body" type="text">

                    </div>

                    <input class="btn btn-success" name="save2" type="submit">

                </form>
            </div>

    

    
        </div>
    </div> <!-- end wrapper-->
    <?php include ('script.php');?>

</body>
</html>