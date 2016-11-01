<?php	

include_once("../../DAO/config.php");
class resaleHdbDAO{
	public static function getFlatDetails($conn,$buyerNRIC){
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
		
		$result = $conn->query($sql);
		$resultarray = mysqli_fetch_all($result,MYSQLI_NUM);
		return $resultarray;
	}
}
?>