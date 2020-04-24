<?php
include ('dbcon.php');
if (isset ($_POST ['done'])){
$voters_id = $_GET['voter_id'];
$id_number=$_POST['id_number'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
//$year_level=$_POST['year_level'];
$mobile=$_POST['mobile'];
$ward=$_POST['ward'];
$account=$_POST['account'];
$conn->query ("UPDATE voters SET id_number = '$id_number', firstname = '$firstname', lastname = '$lastname', 
account = '$account', ward='$ward', mobile='$mobile' WHERE voters_id = '$voters_id'")or die(mysql_error());
}
header("location: voters.php");
?>