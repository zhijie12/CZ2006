<?php	

include_once("../../DAO/config.php");
class HDBDealDAO{
	public static function getDealDetails($conn,$buyerNRIC){
		$sql2 = "select ownerNRIC, r.resaleID, buyerOffer from 
		resaleflat r left join concludeDeal c 
		on r.resaleID = c.resaleID 
		AND r.ownerNRIC = c.sellerNRIC 
		AND '".$buyerNRIC."' = c.buyerNRIC
		WHERE r.concluded = 0
		";

		$result = $conn->query($sql2);
		$resultArray = mysqli_fetch_all($result,MYSQLI_NUM);
		return $resultArray;
	}
}
?>