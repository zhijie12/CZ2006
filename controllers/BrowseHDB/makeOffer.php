<?php 
include("../config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="makeOffer"){
		
		$resaleID = $_GET['resaleID'];
		$buyerNRIC = $_GET['buyerNRIC'];
		$sellerNRIC = $_GET['sellerNRIC'];
		$proposeOffer = $_GET['proposeOffer']; 
		
		//Deal Status (buyerPropose/SellerAccept/SellerReject/BuyerAccept)

		$sql = "INSERT into concludeDeal (buyerNRIC, buyerOffer, dealStatus, resaleID, sellerNRIC, dateStarted)
		VALUES ('".$buyerNRIC."', ".$proposeOffer.", 'buyerOffer', '".$resaleID."', '".$sellerNRIC."', NOW())";
		echo $sql;
	}
}
?>



