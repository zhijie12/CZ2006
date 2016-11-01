<?php 
include("../config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="makeOffer"){
		
		$resaleID = $_GET['resaleID'];
		$buyerNRIC = $_GET['buyerNRIC'];
		$sellerNRIC = $_GET['sellerNRIC'];
		$proposeOffer = $_GET['proposeOffer']; 

		if ($proposeOffer<0){
			$array=array('makeOffer','negativeOffer');	
			$_SESSION["fromWhere"] = $array;
			header("Location: ../../browseHDB.php");
			return;
		}
		
		//Deal Status (buyerPropose/SellerAccept/SellerReject/BuyerAccept)
		$insertSQL = "INSERT into concludeDeal (buyerNRIC, buyerOffer, dealStatus, resaleID, sellerNRIC, dateStarted)
		VALUES ('".$buyerNRIC."', ".$proposeOffer.", 'Pending offer', '".$resaleID."', '".$sellerNRIC."', NOW())";
		
		$updateSQL = "update concludeDeal set buyerOffer=".$proposeOffer." where resaleID=".$resaleID." AND sellerNRIC = '".$sellerNRIC."' AND buyerNRIC = '".$buyerNRIC."'";
		if ($mysql->query($insertSQL)==true){ 
			$array=array('makeOffer','s');

		}else if ($mysql->query($updateSQL)==true){
			$array=array('makeOffer','u');			
		}else { 
			$array=array('makeOffer','f');			
		}
		
		//echo $updateSQL;
		$_SESSION["fromWhere"] = $array;
		header("Location: ../../browseHDB.php");			
	}
}
?>



