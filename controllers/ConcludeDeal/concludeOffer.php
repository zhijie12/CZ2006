<?php
include("../config.php");
session_start();

		$successCount=0;
		$submitType = $_POST['submitType'];
		$buyerNRIC = $_POST['buyerNRIC'];
		$sellerNRIC = $_SESSION['userProfile'];
		$resaleID = $_POST['resaleID']; 
		$currentStatus= $_POST['currentStatus'];
		if($_POST['currentStatus']=="Rejected" && $submitType!="Accepted")
		{//Reject a reject... trying to be funny
				$array=array('concludeOffer','s');	
				$_SESSION["concludeOffer"] = $array;
				header("Location: ../../ViewAllDeals.php");	
		}	

		if($_POST['currentStatus']=="buyerOffer" || $_POST['currentStatus']=="Rejected") {

			if($submitType=="Accepted"){
				$UpdateSQL1= "UPDATE concludeDeal SET dealStatus='Rejected' where resaleID= '".$resaleID."'"; 
					if ($mysql->query($UpdateSQL1)==true){
						$successCount++;
					}
				$updateSQL3 = "update resaleflat set concluded=1 where resaleID='".$resaleID."'";
					if ($mysql->query($updateSQL3)==true){
						$successCount++;
					}
				}
				//Deal Status (buyerPropose/SellerAccept/SellerReject/BuyerAccept)
				$UpdateSQL2= "UPDATE concludeDeal SET dealStatus='".$submitType."' where resaleID= '".$resaleID."' AND buyerNRIC ='".$buyerNRIC."'"; 
					if ($mysql->query($UpdateSQL2)==true){
						$successCount++;
					}
				//add notifications...

				if (($submitType!="Accepted" && $successCount==1) || ($submitType=="Accepted" && $successCount==3)){ 
					$array=array('concludeOffer','s');	
				}else { 
					$array=array('concludeOffer','f');			
				}
				
				//echo $updateSQL;
				$_SESSION["concludeOffer"] = $array;
				header("Location: ../../ViewAllDeals.php");	

		}else if($_POST['currentStatus']=="Accepted"){
			//negate all accepted deals
				$UpdateSQL1= "UPDATE concludeDeal SET dateEnded= NULL, dealStatus='buyerOffer' where resaleID= '".$resaleID."'"; 
					if ($mysql->query($UpdateSQL1)==true){
						$successCount++;
					}
				$updateSQL3= "update resaleflat set concluded=0 where resaleID='".$resaleID."'";
					if ($mysql->query($updateSQL3)==true){
						$successCount++;
					}
				$UpdateSQL2= "UPDATE concludeDeal SET dateEnded=NULL, dealStatus='Rejected' where resaleID= '".$resaleID."' AND buyerNRIC ='".$buyerNRIC."'"; 
					if ($mysql->query($UpdateSQL2)==true){
						$successCount++;
					}
			if (($successCount==3) || ($successCount==3)){ 
					$array=array('concludeOffer','s');	
				}else { 
					$array=array('concludeOffer','f');			
				}
				$_SESSION["concludeOffer"] = $array;
				header("Location: ../../ViewAllDeals.php");	
		}	
?>