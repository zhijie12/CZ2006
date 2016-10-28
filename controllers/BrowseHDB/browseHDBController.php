<?php 
include("../config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="load"){

		$value;
		$monthArr = array();

		$sql = "SELECT `resaleID`, `imgUrl`, `address`, `flatType`, `storey`, `floorArea`, `leaseCommenceDate`, `price`, `email`, `hdbDescription` FROM `resaleflat` INNER JOIN `UserAccounts` on `ownerNRIC` = `nric` where concluded=0";
		
		$result = $mysql->query($sql);
		$resultarray = mysqli_fetch_all($result,MYSQLI_NUM);
		
		$sql2 = "select `ownerNRIC` from resaleflat";
		$result2 = $mysql->query($sql2);
		$ownerNRIC = mysqli_fetch_all($result2,MYSQLI_NUM);

		for ($i=0; $i<count($resultarray);$i++){

			$resultarray[$i][1] = '<img src="' . $resultarray[$i][1] . '" width="128" height="128">';
			$resultarray[$i][7] = "$".$resultarray[$i][7]; // Price column
			$resultarray[$i][10] = 
				"<form action='controllers/BrowseHDB/makeOffer.php' method='get'>
					<input type='text' name='proposeOffer' style='width=100px'> 
					<input type='hidden' name='resaleID' value='".$resultarray[$i][0]."'> 
					<input type='hidden' name='buyerNRIC' value='".$_SESSION['userNRIC']."'>
					<input type='hidden' name='sellerNRIC' value='".$ownerNRIC[$i][0]."'>
					<input type='hidden' name='action' value='makeOffer'>
					<input type='submit' style='margin:auto'>
				</form>"; //Offer column
		}
	
		$final = array("draw"=>1,"recordsTotal"=>count($resultarray),"recordsFiltered"=>count($resultarray),"data"=>$resultarray);
		$json = json_encode($final);
		echo $json;

	}
}
?>



