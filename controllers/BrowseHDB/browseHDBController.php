<?php 
include_once("../../DAO/mysql/resaleHdbDAO.php");
include_once("../../DAO/mysql/HDBDealDAO.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="load"){

		$buyerNRIC = $_SESSION['userNRIC'];
		if (isset($_SESSION['eligibilityBuy'])){
			$eligibleToBuy = $_SESSION['eligibilityBuy'];		
		}else {
			$eligibleToBuy = null;
		}
		

		$resultarray = resaleHdbDAO::getFlatDetails($mysql,$buyerNRIC);
		$resultArray2 = HDBDealDAO::getDealDetails($mysql,$buyerNRIC);
		
		for ($i=0; $i<count($resultarray);$i++){

			$resultarray[$i][0] = '<img src="' . $resultarray[$i][0] . '" width="128" height="128">';
			$resultarray[$i][6] = "$".$resultarray[$i][6]; // Price column
			
			if ($eligibleToBuy == 1){
				$resultarray[$i][9] = 
					"
					<form name='proposeOfferForm' action='controllers/BrowseHDB/makeOffer.php' method='get' >
						<input type='text' id='proposeOffer' name='proposeOffer' style='width=100px' value='".$resultArray2[$i][2]."'> 
						<input type='hidden' name='resaleID' value='".$resultArray2[$i][1]."'> 
						<input type='hidden' name='buyerNRIC' value='".$buyerNRIC."'>
						<input type='hidden' name='sellerNRIC' value='".$resultArray2[$i][0]."'>
						<input type='hidden' name='action' value='makeOffer'>
						<input type='submit' style='margin:auto'>
					</form>"; //Offer column
			} else {
				$resultarray[$i][9] = "Not Eligible";
			}
		}
		
		//echo $sql2;
		$final = array("draw"=>1,"recordsTotal"=>count($resultarray),"recordsFiltered"=>count($resultarray),"data"=>$resultarray);
		$json = json_encode($final);
		echo $json;

	}
}
?>



