<?php
	include("admin/dbcon.php");
	session_start();
	session_destroy();
	$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
	function encryptthis($data, $key) { 
	$encryption_key = base64_decode($key); $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
	return base64_encode($encrypted . '::' . $iv); }
	$pres_id=$_SESSION[pres_id];
	$pres_id=encryptthis($pres_id,$key);


		$conn->query("INSERT INTO `votes` VALUES('', '$pres_id', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[vpinternal_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[vpexternal_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[secretary_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[auditor_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[treasurer_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[pio_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[busman_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[sgtarm_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[muse_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[escort_id]', '$_SESSION[voters_id]')") or die(mysql_error());
		$conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die(mysql_error());
		header("location:index.php");
		
?> 