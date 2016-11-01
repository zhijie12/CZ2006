<?php
include_once("../../DAO/config.php");
include_once("../../entity/UserAccount.php");
class UserAccountDAO{
	public static function createAccount($conn,$NRIC,$PW,$EMAIL){
		$sql = "INSERT INTO UserAccounts (NRIC,email,password)
				VALUES (?,?,?);";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sss",$NRIC,$EMAIL,$PW);
		$result = $stmt->execute();
		$stmt->close();
		return $result; 
	}
	public static function checkDuplicate($conn,$NRIC){
		$result = 0;
		
		$sql = "SELECT count(1) from UserAccounts WHERE NRIC = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$NRIC);
		$stmt->execute(); 
		$stmt->bind_result($result);
		$stmt->fetch();
		
		$stmt->close();
		return $result;
	}
	public static function getAccountDetails($conn,$NRIC,$Password){
		$id;
		$nric;
		$email;
		$createdTime;
		$password;
		$userAcc = null;
		$sql = "SELECT * from UserAccounts WHERE NRIC = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$NRIC);
		$stmt->execute(); 
		$stmt->bind_result($password,$createdTime,$nric,$email);
		while($stmt->fetch()){
			
			$userAcc = new UserAccount();
			$userAcc->setNric($nric);
			$userAcc->setEmail($email);
			$userAcc->setCreatedTime($createdTime);
			$userAcc->setPassword($password);
			if(password_verify($Password,$password)==false){
				$userAcc = null;
			}
		}
		$stmt->close();
		return $userAcc;
	}
}
?>