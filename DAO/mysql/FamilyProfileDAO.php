<?php	

include_once("../../DAO/config.php");
class FamilyProfileDAO{
	public static function createFamilyProfile($conn,$familyProfile){
		$sql = "INSERT INTO `coapplicant` 
			(`name`, `nric`, `dateOfBirth`,
			`houseHoldNum`, `relationship`, `income`,
			`hdbOwnership`, `citizenship`, `mainApplicantNRIC`,
			`occupation`, `address`, `postalCode`,
			`contactNumber`) values
            (?,?,?,?,?,?,?,?,?,?,?,?,?)";
         
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssssssssssss",
						$familyProfile->fullname,$familyProfile->nric,
						$familyProfile->dateofbirth,$familyProfile->householdNum,
						$familyProfile->relationship,$familyProfile->income,
						$familyProfile->hdbOwnership,$familyProfile->citizenship,
						$familyProfile->mainapplicantnric,$familyProfile->occupation,
						$familyProfile->address,$familyProfile->postalcode,
						$familyProfile->contactnumber);
		$result = $stmt->execute();
		$stmt->close();
		return $result; 
	}
	public static function deleteFamilyProfile($conn,$NRIC){
		$sql = "DELETE from coapplicant WHERE mainApplicantNRIC = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$NRIC);
		$result = $stmt->execute();
		$stmt->close();
		return $result; 
	}
	public static function checkExist($conn,$NRIC){
		$result = 0;
		
		$sql = "SELECT count(1) from coapplicant WHERE mainApplicantNRIC = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$NRIC);
		$stmt->execute(); 
		$stmt->bind_result($result);
		$stmt->fetch();
		
		$stmt->close();
		return $result;
	}
	public static function getFamilyProfileDetails($conn,$NRIC){
		$sql = "SELECT * FROM coapplicant where mainApplicantNRIC = '$NRIC'";
		$result = $conn->query($sql);
		$array = mysqli_fetch_all($result,MYSQLI_NUM);
		return $array;
	}
}
?>