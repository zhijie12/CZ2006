<?php 
include("../config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="proposed2me"){

		$sellerNRIC = $_SESSION['userNRIC'];
		$sql ="SELECT mainapplicant.nric,mainapplicant.name,mainapplicant.profileUrl,mainapplicant.contactNo,mainapplicant.occupation,mainapplicant.citizenship,UserAccounts.email, concludeDeal.buyerOffer,concludeDeal.dealStatus,concludeDeal.dateStarted, coapplicant.relationship,concludeDeal.resaleID
		FROM mainapplicant 
		LEFT JOIN coapplicant ON mainapplicant.nric= coapplicant.mainApplicantNRIC
		INNER JOIN UserAccounts ON mainapplicant.nric=UserAccounts.NRIC 
		INNER JOIN concludeDeal ON mainapplicant.nric=concludeDeal.buyerNRIC
		 Where concludeDeal.sellerNRIC='".$sellerNRIC."'";
		
		$result = $mysql->query($sql);
		$resultarray = mysqli_fetch_all($result,MYSQLI_NUM);
		$finalResult= array();
		for ($i=0; $i<count($resultarray);$i++){

				$finalResult[$i]= array();
				$finalResult[$i][0]='<p style="text-align:center;font-weight:bold;">'.$resultarray[$i][1].'</p><img src="'.$resultarray[$i][2] . '" width="128" height="128">';
				$finalResult[$i][1]=$resultarray[$i][3];
				$finalResult[$i][2]=$resultarray[$i][6];
				$finalResult[$i][3]=$resultarray[$i][5];
				if(!$resultarray[$i][10]='NULL'){
					$finalResult[$i][4]=$resultarray[$i][10];
				}else
					$finalResult[$i][4]="None";
				$finalResult[$i][5]=$resultarray[$i][7];
				$finalResult[$i][6]=$resultarray[$i][9];
				if($resultarray[$i][8]=="buyerOffer"){
					$finalResult[$i][7]="Pending Response";
				}else{
					$finalResult[$i][7]=$resultarray[$i][8];
				}
				$finalResult[$i][8]=
				"<form action='controllers/concludeDeal/concludeOffer.php' method='post'>
					<input type='hidden' name='submitType' value='Accepted'> 
					<input type='hidden' name='buyerNRIC' value='".$resultarray[$i][0]."'>
					<input type='hidden' name='sellerNRIC' value='".$sellerNRIC."'>
					<input type='hidden' name='resaleID' value='".$resultarray[$i][11]."'>
					<input type='submit' style='margin:auto' value='Accept Offer'>
				</form>";
				$finalResult[$i][9]=
				"<form action='controllers/concludeDeal/concludeOffer.php' method='post'>
					<input type='hidden' name='submitType' value='Rejected'> 
					<input type='hidden' name='buyerNRIC' value='".$resultarray[$i][0]."'>
					<input type='hidden' name='sellerNRIC' value='".$sellerNRIC."'>
					<input type='hidden' name='resaleID' value='".$resultarray[$i][11]."'>
					<input type='submit' style='margin:auto' value='Reject Offer'>
				</form>";


		}
		$final = array("draw"=>1,"recordsTotal"=>count($finalResult),"recordsFiltered"=>count($finalResult),"data"=>$finalResult);
		$json = json_encode($final);
		echo $json;
	}

}
?>