<?php
include("../config.php");
session_start();

		$successCount=0;
		$submitType = $_POST['submitType'];
		$buyerNRIC = $_POST['buyerNRIC'];
		$sellerNRIC = $_SESSION['userProfile'];
		$resaleID = $_POST['resaleID']; 
		if($submitType!="Accepted"){
		$UpdateSQL1= "UPDATE concludeDeal SET dateEnded=NOW(), dealStatus='Rejected' where resaleID= '".$resaleID."'"; 
			if ($mysql->query($UpdateSQL1)==true){
				$successCount++;
			}
		}
		//Deal Status (buyerPropose/SellerAccept/SellerReject/BuyerAccept)
		$UpdateSQL2= "UPDATE concludeDeal SET dateEnded=NOW(), dealStatus='".$submitType."' where resaleID= '".$resaleID."' AND buyerNRIC ='".$buyerNRIC."'"; 
			if ($mysql->query($UpdateSQL2)==true){
				$successCount++;
			}
		$updateSQL3 = "update resaleflat set concluded=1 where resaleID='".$resaleID."'";
			if ($mysql->query($updateSQL3)==true){
				$successCount++;
			}
		//add notifications...

		if (($submitType!="Accepted" && $successCount==3) || ($submitType=="Accepted" && $successCount==2)){ 
			$array=array('concludeOffer','s');	
		}else { 
			$array=array('concludeOffer','f');			
		}
		
		//echo $updateSQL;
		$_SESSION["concludeOffer"] = $array;
		header("Location: ../../ViewAllDeals.php");			
?>






?>