<?php
include ('dbcon.php');

//send email to the person currently edited in modal
function send_secret_voter_id(){
    $email=$_POST['email'];
    $secret_voter_id=$_POST['secret_voter_id'];
    $to_email = $email;
    $subject = "Account Verified";
    $body = "Congratulations!!! Your account is Successfully Verified. \n" . " Your secret voter id is : " .$secret_voter_id. "\n This id is must required to cast vote . So, please keep this id secure. Thank You";
    $headers = 'From: HamroVote @ company. com';

    if (mail($to_email, $subject, $body, $headers)) {

        echo "<h2><p class=\"alert-success text-center\" ><strong>SUCCESS!</strong>Email successfully sent to $to_email...</p></h2>";
    } else {
        echo "<h2><p class=\"alert-danger text-center\" ><strong>ERROR!</strong> Email sending failed </p></h2>";					

    }

}
if (isset ($_POST ['done'])){
    if($_POST['secret_voter_id']==null){
        echo "Please enter secret id";
    }
    else{
        $voters_id = $_GET['voter_id'];
        $id_number=$_POST['id_number'];
        $secret_voter_id=$_POST['secret_voter_id'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        //$year_level=$_POST['year_level'];
        $mobile=$_POST['mobile'];
        $ward=$_POST['ward'];
        $account=$_POST['account'];
        $conn->query ("UPDATE voters SET id_number = '$id_number', secret_voter_id='$secret_voter_id', firstname = '$firstname', lastname = '$lastname', 
        account = '$account', ward='$ward', mobile='$mobile' WHERE voters_id = '$voters_id'")or die(mysql_error());
    

    //send secret voter id to voter via email
    //if (isset($_POST['send_secret_voter_id'])){
     
        send_secret_voter_id();

        


        header("location: voters.php");
 



    }

}


if (isset($_POST['send_secret_voter_id'])){
    send_secret_voter_id();



}

   
//}


?>
