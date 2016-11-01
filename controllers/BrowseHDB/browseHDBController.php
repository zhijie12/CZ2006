<?php 
include("../config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="load"){

		$buyerNRIC = $_SESSION['userNRIC'];

		$sql = "SELECT
				  `imgUrl`,
				  `address`,
				  `flatType`,
				  `storey`,
				  `floorArea`,
				  `leaseCommenceDate`,
				  `price`,
				  `email`,
				  `hdbDescription`
				FROM
				  `resaleflat`
				INNER JOIN
				  `UserAccounts`
				ON
				  `ownerNRIC` = `nric`
				WHERE
				  concluded = 0
				  AND ownerNRIC != '".$buyerNRIC."'";
		
		$result = $mysql->query($sql);
		$resultarray = mysqli_fetch_all($result,MYSQLI_NUM);
		
		$sql2 = "select ownerNRIC, r.resaleID, buyerOffer from 
		resaleflat r left join concludeDeal c 
		on r.resaleID = c.resaleID 
		AND r.ownerNRIC = c.sellerNRIC 
		AND '".$buyerNRIC."' = c.buyerNRIC
		WHERE r.concluded = 0
		";

		$result2 = $mysql->query($sql2);
		$resultArray2 = mysqli_fetch_all($result2,MYSQLI_NUM);

		for ($i=0; $i<count($resultarray);$i++){

			$resultarray[$i][0] = '<img src="' . $resultarray[$i][0] . '" width="128" height="128">';
			$resultarray[$i][6] = "$".$resultarray[$i][6]; // Price column
			$resultarray[$i][9] = 
				"<form action='controllers/BrowseHDB/makeOffer.php' method='get'>
					<input type='text' name='proposeOffer' style='width=100px' value='".$resultArray2[$i][2]."'> 
					<input type='hidden' name='resaleID' value='".$resultArray2[$i][1]."'> 
					<input type='hidden' name='buyerNRIC' value='".$buyerNRIC."'>
					<input type='hidden' name='sellerNRIC' value='".$resultArray2[$i][0]."'>
					<input type='hidden' name='action' value='makeOffer'>
					<input type='submit' style='margin:auto'>
				</form>"; //Offer column
		}
		
		//echo $sql2;
		$final = array("draw"=>1,"recordsTotal"=>count($resultarray),"recordsFiltered"=>count($resultarray),"data"=>$resultarray);
		$json = json_encode($final);
		echo $json;

	}
}
?>



