<?php	

include_once("../../DAO/config.php");
include_once("../../entity/EligibilityStatus.php");
class eligibilityStatusDAO{
	public static function createEligibility($conn,$es){
		$sql = "INSERT INTO `harmoniouslivingdb`.`eligibilitystatus` 
				(`nric`, `BuyerEligibility`, `SellerEligibility`, `SSCScheme`, `fianceScheme`, `SinglesGrant`, `FamilyGrant`)
				VALUES (?,?,?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
		$stmt->bind_param("sssssss",
						$es->NRIC,$es->BuyerEligibility,
						$es->SellerEligibility,$es->SSCScheme,
						$es->fianceScheme,$es->SinglesGrant,
						$es->FamilyGrant);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
	public static function checkExist($conn,$NRIC){
		$result = 0;
		$sql = "Select count(1) from `harmoniouslivingdb`.`eligibilitystatus` where NRIC=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$NRIC);
		$stmt->execute(); 
		$stmt->bind_result($result);
		$stmt->fetch();
		
		$stmt->close();
		return $result;
	}
	public static function deleteProfile($conn,$NRIC){
		$sql = "delete from `harmoniouslivingdb`.`eligibilitystatus` where NRIC=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$NRIC);
		$result = $stmt->execute();
		$stmt->close();
		return $result; 
	}
	public static function getEligibility($conn,$NRIC){
		$sql="Select * from `harmoniouslivingdb`.`eligibilitystatus` where NRIC='$NRIC'";
		$result = $conn->query($sql);
		$array = mysqli_fetch_array($result,MYSQLI_ASSOC);
		return $array;
	}
}
?>