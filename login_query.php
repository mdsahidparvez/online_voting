<?php
	require_once 'admin/dbcon.php';
	
	if(isset($_POST['login'])){
		$idno=$_POST['idno'];
		$password=$_POST['password'];
	
		$result = $conn->query("SELECT * FROM voters WHERE id_number = '$idno'  && `account` = 'active' && `status` = 'Unvoted'") or die(mysqli_errno());
		$row = $result->fetch_array();
		$voted = $conn->query("SELECT * FROM `voters` WHERE id_number = '$idno' && `status` = 'Voted'")->num_rows;
		$numberOfRows = $result->num_rows;				
		$sql = $conn->query("SELECT * FROM voters WHERE id_number = '$idno'  && `account` = 'active' && `status` = 'Unvoted'") or die(mysqli_errno());


		if ($numberOfRows > 0){
			session_start();
			$data=$sql->fetch_array();
			if(password_verify($password, $data['password'])){
				$_SESSION['voters_id'] = $row['voters_id'];
				header('location:vote.php');
				header('location:ward2.php');
			}
		
		}
		
		if($voted == 1){
			echo " <br><center><font color= 'red'  size='5'>You have already voted</center></font>";
		}else{
			echo " <br><center><font color= 'red' size='3'>LOGIN ERROR!</center></font>";
		}
	
	}
?>