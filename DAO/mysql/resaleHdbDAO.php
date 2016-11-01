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
	public static function createResaleFlat_WImage($conn,$ResaleFlat){
		$sql = "INSERT INTO `resaleflat` 
			(`town`, `flatType`, `address`, `storey`, `floorArea`, `flatModel`, `leaseCommenceDate`, `price`, `ownerNRIC`, `uploadDate`, `imgUrl`, `hdbDescription`)
             VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";     
        $stmt = $conn->prepare($sql);
		$stmt->bind_param("ssssssssssss",
						$ResaleFlat->town,$ResaleFlat->flatType,
						$ResaleFlat->address,$ResaleFlat->storey,
						$ResaleFlat->floorarea,$ResaleFlat->flatModel,
						$ResaleFlat->leaseCommence,$ResaleFlat->askingPrice,
						$ResaleFlat->nric,$ResaleFlat->date,
						$ResaleFlat->img,$ResaleFlat->hdbDescription);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
	public static function createResaleFlat_WOImage($conn,$ResaleFlat){
		$sql = "INSERT INTO `resaleflat` 
			(`town`, `flatType`, `address`, `storey`, `floorArea`, `flatModel`, `leaseCommenceDate`, `price`, `ownerNRIC`, `uploadDate`, `hdbDescription`)
             VALUES (?,?,?,?,?,?,?,?,?,?,?)";     
        $stmt = $conn->prepare($sql);
		$stmt->bind_param("sssssssssss",
						$ResaleFlat->town,$ResaleFlat->flatType,
						$ResaleFlat->address,$ResaleFlat->storey,
						$ResaleFlat->floorarea,$ResaleFlat->flatModel,
						$ResaleFlat->leaseCommence,$ResaleFlat->askingPrice,
						$ResaleFlat->nric,$ResaleFlat->date,
						$ResaleFlat->hdbDescription);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
	public static function updateResaleFlat_WImage($conn,$ResaleFlat){
		$sql = "UPDATE `resaleflat` SET 
		`town` = ?, `flatType` = ?, `address` = ?, `storey` = ?, `floorArea` = ?, `flatModel` = ?, `leaseCommenceDate` =?,
		`price` = ?, `uploadDate` = ?, `imgUrl` = ?, `hdbDescription` = ? WHERE `resaleflat`.`ownerNric` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssssssssssss",
						$ResaleFlat->town,$ResaleFlat->flatType,
						$ResaleFlat->address,$ResaleFlat->storey,
						$ResaleFlat->floorarea,$ResaleFlat->flatModel,
						$ResaleFlat->leaseCommence,$ResaleFlat->askingPrice,
						$ResaleFlat->date,$ResaleFlat->img,
						$ResaleFlat->hdbDescription,$ResaleFlat->nric);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
	public static function updateResaleFlat_WOImage($conn,$ResaleFlat){
		$sql = "UPDATE `resaleflat` SET 
		`town` = ?, `flatType` = ?, `address` = ?, `storey` = ?, `floorArea` = ?, `flatModel` = ?, `leaseCommenceDate` =?,
		`price` = ?, `uploadDate` = ?, `hdbDescription` = ? WHERE `resaleflat`.`ownerNric` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssssssssss",
						$ResaleFlat->town,$ResaleFlat->flatType,
						$ResaleFlat->address,$ResaleFlat->storey,
						$ResaleFlat->floorarea,$ResaleFlat->flatModel,
						$ResaleFlat->leaseCommence,$ResaleFlat->askingPrice,
						$ResaleFlat->date,$ResaleFlat->hdbDescription,
						$ResaleFlat->nric);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
}
?>