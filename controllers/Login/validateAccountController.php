<?php

include_once("../../DAO/mysql/UserAccountDAO.php");
include_once("../../DAO/mysql/UserProfileDAO.php");
include_once("../../DAO/mysql/eligibilityStatusDAO.php");
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
		$es = eligibilityStatusDAO::getEligibility($mysql,$_POST['nric']);
		if($userProfile==null){
			$userProfile= new UserProfile();
			$userProfile->setNric("nil");
		}
		$_SESSION["fromWhere"] = array('Login','s1');
		$_SESSION['userNRIC']= $userAcc->getNric();
		$_SESSION['userEmail']= $userAcc->getEmail();
		$_SESSION['userProfile'] = serialize($userProfile);
		if($es!=NULL){
			$_SESSION['eligibilitySell'] = $es['SellerEligibility'];
			$_SESSION['eligibilityBuy'] = $es['BuyerEligibility'];
		}
		
		header("Location: ../../browseHDB.php");
	}else{
		header("Location: ../../index.php?error=e4");
		exit();
	}
}
?>