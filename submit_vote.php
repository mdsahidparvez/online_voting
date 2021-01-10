<?php
	include("admin/dbcon.php");
	session_start();
	session_destroy();
	$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
	function encryptthis($data, $key) { //encryption function
	$encryption_key = base64_decode($key); 
	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); 
	$encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
	return base64_encode($encrypted . '::' . $iv); }///end encryption function
	$pres_id=$_SESSION['pres_id'];
	$pres_id=encryptthis($pres_id,$key);
	$vpinternal_id=$_SESSION['vpinternal_id'];
	$vpinternal_id=encryptthis($vpinternal_id,$key);
	$vpexternal_id=$_SESSION['vpexternal_id'];
	$vpexternal_id=encryptthis($vpexternal_id,$key);
	$secretary_id=$_SESSION['secretary_id'];
	$secretary_id=encryptthis($secretary_id,$key);
	$auditor_id=$_SESSION['auditor_id'];
	$auditor_id=encryptthis($auditor_id,$key);
	$treasurer_id=$_SESSION['treasurer_id'];
	$treasurer_id=encryptthis($treasurer_id,$key);
	
/* testing*/ 	
$query=$conn->query("select election_id from election where status='active'");
while($row1 = $query->fetch_array()){
	$election_id=$row1['election_id'];
}
$votesTable="votes_".$election_id;
/* end Testing*/
		//insert votes in the votes table
		$conn->query("INSERT INTO `$votesTable` VALUES('', '$pres_id', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `$votesTable` VALUES('', '$vpinternal_id', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `$votesTable` VALUES('', '$vpexternal_id', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `$votesTable` VALUES('', '$secretary_id', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `$votesTable` VALUES('', '$auditor_id', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `$votesTable` VALUES('', '$treasurer_id', '$_SESSION[voters_id]')") or die(mysql_error());
	//	$conn->query("INSERT INTO `votes` VALUES('', '$pio_id', '$_SESSION[voters_id]')") or die(mysql_error());
	//	$conn->query("INSERT INTO `votes` VALUES('', '$busman_id', '$_SESSION[voters_id]')") or die(mysql_error());
	//	$conn->query("INSERT INTO `votes` VALUES('', '$sgtarm_id', '$_SESSION[voters_id]')") or die(mysql_error());
	//	$conn->query("INSERT INTO `votes` VALUES('', '$muse_id', '$_SESSION[voters_id]')") or die(mysql_error());
	//	$conn->query("INSERT INTO `votes` VALUES('', '$escort_id', '$_SESSION[voters_id]')") or die(mysql_error());
		


		//update voter status after voting
		$conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die(mysql_error());
		echo"<script> alert('Your vote is Submitted. Thank you');</script>";
		header("location:index.php");
		
?> 