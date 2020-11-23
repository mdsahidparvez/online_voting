<?php

    require_once 'admin/dbcon.php';
    

    if(isset($_POST['vote-now'])){
		$idno=$_SESSION['voters_id'];
	
		$result = $conn->query("SELECT * FROM voters WHERE voters_id = '$idno'  && `account` = 'active' && `status` = 'Unvoted'") or die(mysqli_errno());
		$row = $result->fetch_array();
		$voted = $conn->query("SELECT * FROM `voters` WHERE voters_id = '$idno' && `status` = 'Voted'")->num_rows;
		$numberOfRows = $result->num_rows;				
		$sql = $conn->query("SELECT * FROM voters WHERE voters_id = '$idno'  && `account` = 'active' && `status` = 'Unvoted'") or die(mysqli_errno());


		if ($numberOfRows > 0 && $_POST['secret_voter_id']==$row['secret_voter_id']){
			session_start();
			$data=$sql->fetch_array();
				$_SESSION['voters_id'] = $row['voters_id'];
				header('location:ward2.php');

			
		
		}
		
		if($voted == 1){
			echo " <br><center><div style='background-color:white'><font color= 'red'  >You have already voted</center></font><div>";
		}else{
			echo " <br><center><div style='background-color:white;display:block;'><font color= 'red'>Login Error !</center></font><div>";
		}
	
	}