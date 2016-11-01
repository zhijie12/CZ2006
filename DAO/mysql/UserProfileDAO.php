<?php	

include_once("../../DAO/config.php");
include_once("../../entity/UserProfile.php");
class UserProfileDAO{
	public static function createProfile($conn,$userProfile){
		$sql = "INSERT INTO `mainapplicant` 
			(`nric`, `contactNo`, `name`, `address`, `postalCode`, `dateOfBirth`, `occupation`, `income`, `citizenship`, `profileUrl`, `MOPStatus`, `hdbOwnership`) VALUES
            (?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sississdssis",
						$userProfile->nric,$userProfile->contactnumber,
						$userProfile->fullname,$userProfile->address,
						$userProfile->postalcode,$userProfile->dateofbirth,
						$userProfile->occupation,$userProfile->income,
						$userProfile->citizenship,$userProfile->profileURL,
						$userProfile->MOPStatus,$userProfile->hdbOwnership);
		$result = $stmt->execute();
		$stmt->close();
		return $result; 
	}
	public static function deleteProfile($conn,$NRIC){
		$sql = "DELETE from mainapplicant WHERE nric = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$NRIC);
		$result = $stmt->execute();
		$stmt->close();
		return $result; 
	}
	public static function checkExist($conn,$NRIC){
		$result = 0;
		
		$sql = "SELECT count(1) from mainapplicant WHERE NRIC = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$NRIC);
		$stmt->execute(); 
		$stmt->bind_result($result);
		$stmt->fetch();
		
		$stmt->close();
		return $result;
	}
	public static function getProfileDetails($conn,$NRIC){
		$userProfile = null;
		$NRIC;
		$contactNo;
		$name;
		$address;
		$postal;
		$dob;
		$occupation;
		$income;
		$citizenship;
		$profileURL;
		$MOPStatus;
		$hdbOwnership;
		$sql="Select * from mainapplicant where NRIC=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$NRIC);
		$stmt->execute(); 
		$stmt->bind_result($NRIC,$contactNo,$name,$address,$postal,$dob,$occupation,$income,$citizenship,$profileURL,$MOPStatus,$hdbOwnership);
		while($stmt->fetch()){
			$userProfile = new UserProfile();
			$userProfile->setContactNumber(contactNo);
			$userProfile->setFullName($name);
			$userProfile->setAddress($address);
			$userProfile->setDateOfBirth($dob);
			$userProfile->setPostalCode($postal);
			$userProfile->setOccupation($occupation);
			$userProfile->setIncome($income);
			$userProfile->setCitizenship($citizenship);
			$userProfile->setProfileURL($profileURL);
			$userProfile->setNric($NRIC);
			$userProfile->setMOPStatus($MOPStatus);
			$userProfile->setHDBOwnership($hdbOwnership);
		}
		$stmt->close();
		return $userProfile;
	}
}
?>