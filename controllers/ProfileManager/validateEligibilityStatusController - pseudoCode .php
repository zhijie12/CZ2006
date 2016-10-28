<?php
	include("../config.php");
	include("../../entity/UserProfile.php");
	session_start();
	function checkEligibility($mysql){
		//eligibility to buy resale
		$eligibilityBuy = false;
		if(mainapplicant.hdbOwnership=="no"){
			if(mainapplicant.age >=21){
				if(maritalStatus=="Married"){
					$eligibilityBuy = true;
				}
			}
		}
		//eligibility to sell resale
		$eligibilitySell = false;
		if(mainapplicant.hdbOwnership=="yes"&&mainapplicant.MOPStatus>=5){
			$eligibilitySell = true;
		}
		
		//Fiance fiancee Scheme
		/* 
		You and your fiancé or fiancée must:
			Register your marriage with the Registry of Civil Marriages or Registry of Muslim Marriages
			Submit your marriage certificate to us within 3 months from  resale completion date 
		If applying for CPF Housing Grant
			You must submit your marriage certificate on or before the resale completion date
		*/
		$FianceFianceeScheme = false;
		if(mainapplicant.hdbOwnership=="no"){
			if(maritalStatus=="Married"){
				if(mainapplicant.citizenship == "singaporean" || coapplicant.citizenship == "singaporean"){
					if(mainapplicant.age >=21 && coapplicant.age >=21){
						$FianceFianceeScheme = true;
						$eligibilityBuy = true;
					}
				}
			}
		}
		
		//Single Singapore Citizen
		$SingleSingaporeCitizen = false;
		if(mainapplicant.hdbOwnership=="no"){
			if(mainapplicant.citizenship == "singaporean"){
				if(maritalStatus=="single" || maritalStatus=="divorced"){
					if(mainapplicant.age >=35){
						$SingleSingaporeCitizen = true;
						$eligibilityBuy = true;
					}
				}else if(maritalStatus=="widowed"||maritalStatus=="orphan"){
					if(mainapplicant.age >=21){
						$SingleSingaporeCitizen = true;
						$eligibilityBuy = true;
					}
				}
			}
		}
		
		//Singles Grant
		$SinglesGrant = false;
		$SinglesGrantAmount = 6000;
		if($SingleSingaporeCitizen==true){
			if(mainapplicant.hdbOwnership==false){
				if(mainapplicant.salary<=6000){
					$SinglesGrant = true;
				}
			}
		}
		
		//First Time Family grant
		$FirstTimeFamilygrant = false;
		$FirstTimeFamilygrantAmount = 20000;
		if($FianceFianceeScheme==true){
			if(mainapplicant.hdbOwnership==false&&coapplicant.hdbOwnership==false){
				if((mainapplicant.salary+coapplicant.salary)<=12000){
					$FirstTimeFamilygrant = true;
				}
			}
		}
	}
	checkEligibility($mysql);
?>