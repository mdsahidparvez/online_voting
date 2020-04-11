<?php include ('../admin/dbcon.php');?>

<?php


	$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';

	function decryptthis($data, $key) { 
		$encryption_key = base64_decode($key);
		list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
		return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv); 
	} 

    $count1=0;
    $count2=0;
    $count3=0;
	$count4=0;
	$count5=0;
    $count6=0;
	$count7=0;
	$count8=0;
    $count9=0;
    $count10=0;
    $count11=0;
    $count12=0;
    $count13=0;
    $count14=0;
    $count15=0;
	$count16=0;
	$count17=0;
	$count18=0;	
	$count19=0;
	$count20=0;
	$count21=0;
	$count22=0;
	$count23=0;
	$count24=0;

	


	$result=$conn->query("select * from votes ");
    while($row=$result->fetch_assoc()){
		//$candidate_id=$row['candidate_id'];	//without decrypting
    	$candidate_id=decryptthis( $row['candidate_id'],$key); //decrypting the candidate_id 
	   // echo'<p>Candidate_id:'.$candidate_id.'</p>';
	   
	   if ($candidate_id==1){

		$count1++;
		  
		   //$total= $candidate_id;
		   //echo ($total);

	   }
	   elseif($candidate_id==2){
		$count2++;
	   }
	   elseif($candidate_id==3){
		$count3++;
	   }
	   elseif($candidate_id==4){
		$count4++;
       }
       elseif($candidate_id==5){
		$count5++;
       }
       elseif($candidate_id==6){
		$count6++;
	   }
	   elseif($candidate_id==7){
		$count7++;
       }
       elseif($candidate_id==8){
		$count8++;
       }
       elseif($candidate_id==9){
		$count9++;
       }
       elseif($candidate_id==10){
		$count10++;
       }
       elseif($candidate_id==11){
		$count11++;
       }
       elseif($candidate_id==12){
		$count12++;
       }
       elseif($candidate_id==13){
		$count13++;
       }
       elseif($candidate_id==14){
		$count14++;
       }
       elseif($candidate_id==15){
		$count15++;
       }
       
	   elseif($candidate_id==16){
		$count16++;
	   }
	   elseif($candidate_id==17){
		$count17++;
	   }
	   elseif($candidate_id==18){
		$count18++;
	   }
	   elseif($candidate_id==19){
		$count19++;
	   }
	   elseif($candidate_id==20){
		$count20++;
	   }
	   elseif($candidate_id==21){
		$count21++;
	   }
	   elseif($candidate_id==22){
		$count22++;
	   }
	   elseif($candidate_id==23){
		$count23++;
	   }
	   elseif($candidate_id==24){
		$count24++;
	   }


	}
	

	//echo "20: ".$count20;
	
	 
?>