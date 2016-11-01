<?php

include_once("../../DAO/mysql/UserAccountDAO.php");
include_once("../../DAO/mysql/UserProfileDAO.php");
	//populate entity

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$userAcc = UserAccountDAO::getAccountDetails($mysql,$_POST['nric'],$_POST["password"]);
	if($userAcc!=NULL){
		$userProfile = UserProfileDAO::getProfileDetails($mysql,$_POST['nric']);
		if($userProfile==null){
			$userProfile= new UserProfile();
			$userProfile->setNric("nil");
		}
		$_SESSION["fromWhere"] = array('Login','s1');
		$_SESSION['userNRIC']= $userAcc->getNric();
		$_SESSION['userEmail']= $userAcc->getEmail();
		$_SESSION['userProfile'] = serialize($userProfile);
		header("Location: ../../home.php");
	}else{
		echo "<br/>failed";
		header("Location: ../../index.php?error=e4");
		exit();
	}
}
?>