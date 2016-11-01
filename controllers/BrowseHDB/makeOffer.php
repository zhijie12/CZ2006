<?php 
include("../config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="makeOffer"){
		
		$resaleID = $_GET['resaleID'];
		$buyerNRIC = $_GET['buyerNRIC'];
		$sellerNRIC = $_GET['sellerNRIC'];
		$proposeOffer = $_GET['proposeOffer']; 

		$sql = "Select * from concludeDeal where buyerNRIC='".$buyerNRIC."' AND sellerNRIC='".$sellerNRIC."' AND resaleID='".$resaleID."'";
		$result2= $mysql->query($sql);
		$resultArray= mysqli_fetch_all($result2,MYSQLI_NUM);
		if(count($resultArray)>0){
			//got offered before update can already
		$updateSQL = "update concludeDeal set buyerOffer=".$proposeOffer.",dealStatus='buyerOffer'  where resaleID=".$resaleID." AND sellerNRIC = '".$sellerNRIC."' AND buyerNRIC = '".$buyerNRIC."'";
			if ($mysql->query($updateSQL)==true){
				$array=array('makeOffer','u');			
			}else { 
				$array=array('makeOffer','f');			
			}
			//echo $updateSQL;
			$_SESSION["fromWhere"] = $array;
			header("Location: ../../browseHDB.php");	
		}else{
		//Deal Status (buyerPropose/SellerAccept/SellerReject/BuyerAccept)

			$insertSQL = "INSERT into concludeDeal (buyerNRIC, buyerOffer, dealStatus, resaleID, sellerNRIC, dateStarted)
			VALUES ('".$buyerNRIC."', ".$proposeOffer.", 'buyerOffer', '".$resaleID."', '".$sellerNRIC."', NOW())";
			
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
}
?>



