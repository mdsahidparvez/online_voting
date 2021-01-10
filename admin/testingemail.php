<?php error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");?>
<?php include ('session.php');?>
<?php include ('head.php');?>


<body>
    <div id="wrapper">
        <?php include ('side_bar.php');?>

        <div id="page-wrapper" style="background:#eee;">
            <h3 class="page-header">Send Email</h3>
            <div class="text-center"><i style="font-size:100px;color:darkblue;" class="fas fa-envelope"></i></div>
                                    
            <!-- sending email to a all voters-->

                <?php 
                    require 'dbcon.php';


                    $query = $conn->query("SELECT * FROM voters where account='active' ORDER BY voters_id DESC");
                    while($row1 = $query->fetch_array()){
                        $voters_email=$row1['email'];
                        if (isset($_POST['save'])){
                            
                    
                            $to_email = $voters_email;
                            $subject = $_POST['subject'];
                            $body = $_POST['body'];
                            $headers = 'From: Haro Vote <info@address.com>' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

                    
                            if (mail($to_email, $subject, $body)) {
                                echo "Email successfully sent to $to_email...";
                            } 
                        }


                    }
                ?>




                <div class="container col-md-6 email-all-wrapper" style="background-color:white;padding:5px;">
                    <div class="text-center" style="padding:10px;"><h3>Send Email to all voters</h3></div>
                    <form class="email-all"  method="post">
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
                    $subject2 = $_POST['subject2'];
                    $body = $_POST['body'];
                    // $headers = $_POST['header'];

                    if (mail($to_email, $subject2, $body)) {
                        echo "<h2><p class=\"alert-success text-center\" ><strong>SUCCESS!</strong>Email successfully sent to $to_email...</p></h2>";
                    } else {
                        echo "<h2><p class=\"alert-danger text-center\" ><strong>ERROR!</strong> Email sending failed </p></h2>";					

                    }
                }
            ?>
                <div class="container col-md-6 email-specific-wrapper" style="background-color:white;padding:5px;">
                    <div class="text-center" style="padding:10px;"><h3>Send Email to specific</h3></div>
                    <form class="email-specific"  method="post">
                        <div class="form-group"><label for="">Email</label>
                        <input name="email" type="text" required>
                        </div>
                        <div class="form-group"><label for="">Subject</label>
                            <input name="subject2" type="text">
                        </div>
                        <div class="form-group">
                        <label for="">Message</label>
                        <input style="height:100px; width:200px;"name="body" type="text" required>

                        </div>

                        <input class="btn btn-success" name="save2" type="submit">

                    </form>
                </div>
        </div>
    </div>
    <?php include ('script.php');?>

</body>
</html>