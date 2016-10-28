<?php
	include_once("../../entity/UserProfile.php");
	include_once("../../entity/FamilyProfile.php");
	include_once("../../entity/EligibilityStatus.php");
	function checkEligibility($mysql){
		date_default_timezone_set('Asia/Singapore');
		$table = "<div style='margin-left: 5.5%;'> You are eligible to:<br/><ul>";
		
		$mainapplicant = getMainApplicant($mysql);
		$coapplicant = getCoapplicant($mysql);
		$mainapplicantAge = DateTime::createFromFormat('Y-m-d', $mainapplicant->getDateOfBirth())->diff(new DateTime('now'))->y;
		if($coapplicant!=NULL){
			$coapplicantAge = DateTime::createFromFormat('Y-m-d', $coapplicant->getDateOfBirth())->diff(new DateTime('now'))->y;
		}
		
		//eligibility to sell resale
		$eligibilitySell = 0;
		if(strtoupper($mainapplicant->getHDBOwnership())=="YES"&&$mainapplicant->getMOPStatus()>=5){
			$eligibilitySell = true;
		}
		//eligibility to buy resale
		$eligibilityBuy = 0;
		if($mainapplicant->getHDBOwnership()=="no"){
			if($mainapplicantAge >=21){
				if($coapplicant!=NULL){
					if(strtoupper($coapplicant->getRelationship())=="SPOUSE"){
						$eligibilityBuy = true;
					}
				}
			}
		}
		//Fiance fiancee Scheme
		/* 
		You and your fiancé or fiancée must:
			Register your marriage with the Registry of Civil Marriages or Registry of Muslim Marriages
			Submit your marriage certificate to us within 3 months from  resale completion date 
		If applying for CPF Housing Grant
			You must submit your marriage certificate on or before the resale completion date
		*/
		$FianceFianceeScheme = 0;
		if($coapplicant!=NULL){
			if(strtoupper($mainapplicant->getHDBOwnership())=="NO"&&strtoupper($coapplicant->getHDBOwnership())=="NO"){
				if(strtoupper($coapplicant->getRelationship())=="SPOUSE"){
					if(strtoupper($mainapplicant->getCitizenship()) == "SINGAPOREAN" || strtoupper($coapplicant->getCitizenship())=="SINGAPOREAN"){
						if($mainapplicantAge >=21 && $coapplicantAge >=21){
							$FianceFianceeScheme = true;
							$eligibilityBuy = true;
						}
					}
				}
			}
		}
		
		//Single Singapore Citizen
		$SingleSingaporeCitizen = 0;
		if($coapplicant==NULL){
			if(strtoupper($mainapplicant->getHDBOwnership())=="NO"){
				if(strtoupper($mainapplicant->getCitizenship()) == "SINGAPOREAN"){
					if($mainapplicantAge >=35){
						$SingleSingaporeCitizen = true;
						$eligibilityBuy = true;
					}
				}
			}
		}
		
		//Singles Grant
		$SinglesGrant = 0;
		$SinglesGrantAmount = 0;
		if($SingleSingaporeCitizen==true){
			if(strtoupper($mainapplicant->getHDBOwnership())=="NO"){
				if($mainapplicant->getIncome()<=6000){
					$SinglesGrant = true;
					$SinglesGrantAmount = 6000;
				}
			}
		}
		
		//First Time Family grant
		$FirstTimeFamilygrant = 0;
		$FirstTimeFamilygrantAmount = 0;
		if($FianceFianceeScheme==true){
			if(strtoupper($mainapplicant->getHDBOwnership())=="NO"&&strtoupper($coapplicant->getHDBOwnership())=="NO"){
				if(($mainapplicant->getIncome()+$coapplicant->getIncome())<=12000){
					$FirstTimeFamilygrant = true;
					$FirstTimeFamilygrantAmount = 20000;
				}
			}
		}
		if($eligibilitySell){
			$table = $table."<li>Sell a resale flat</li>";
		}
		if($eligibilityBuy){
			$table = $table."<li>Buy a resale flat</li>";
		}
		if($FianceFianceeScheme){
			$table = $table."<li>For the Fiance Fiancee Scheme</li>";
		}
		if($SingleSingaporeCitizen){
			$table = $table."<li>For the Single Singapore Citizen</li>";
		}
		if($SinglesGrant){
			$table = $table."<li>For the Singles Grant, Grant Amount: \$$SinglesGrantAmount</li>";
		}
		if($FirstTimeFamilygrant){
			$table = $table."<li>For the First Timer Family Grant, Grant Amount: \$$FirstTimeFamilygrantAmount</li>";
		}
		
		$result = array("eligibilityBuy"=>$eligibilityBuy,"eligibilitySell"=>$eligibilitySell,
						"FianceFianceeScheme"=>$FianceFianceeScheme,"SingleSingaporeCitizen"=>$SingleSingaporeCitizen,
						"SinglesGrant"=>$SinglesGrant,"SinglesGrantAmount"=>$SinglesGrantAmount,
						"FirstTimeFamilygrant"=>$FirstTimeFamilygrant,"FirstTimeFamilygrantAmount"=>$FirstTimeFamilygrantAmount);
		$table = $table."</ul></div>";
		if(insertStatus($result,$mysql)){
			return $table;
		}else{
			echo "<br> ERROR";
		}
	}
	function insertStatus($result,$mysql){
		$es = new EligibilityStatus();
		$es->setNRIC($_SESSION['userNRIC']);
		$es->setBuyerEligibility($result['eligibilityBuy']);
		$es->setSellerEligibility($result['eligibilitySell']);
		$es->setSSCScheme($result['SingleSingaporeCitizen']);
		$es->setfianceScheme($result['FianceFianceeScheme']);
		$es->setSinglesGrant($result['SinglesGrantAmount']);
		$es->setFamilyGrant($result['FirstTimeFamilygrantAmount']);
		$sql = $es->checkStatusQuery();
		$result = $mysql->query($sql);
		$NumOfRows = mysqli_num_rows($result);
		if($NumOfRows>0){
			$sql = $es->getDeleteSQL();
			$result = $mysql->query($sql);
		}
		$sql = $es->getInsertSQL();
		$result = $mysql->query($sql);
		if($result){
			return true;
		}else{
			echo mysqli_error($mysql);
			return false;
		}
	}
	function getMainApplicant($mysql){
		$mainapplicant = new UserProfile();
		$mainapplicant->setNric($_SESSION['userNRIC']);
		$sql = $mainapplicant->checkProfileQuery();
		$result = $mysql->query($sql);
		$row = mysqli_fetch_array($result, MYSQL_ASSOC);
		$mainapplicant->setFullName($row['name']);
		$mainapplicant->setContactNumber($row['contactNo']);
		$mainapplicant->setFullName($row['contactNo']);
		$mainapplicant->setAddress($row['address']);
		$mainapplicant->setDateOfBirth($row['dateOfBirth']);
		$mainapplicant->setPostalCode($row['postalCode']);
		$mainapplicant->setOccupation($row['occupation']);
		$mainapplicant->setIncome($row['income']);
		$mainapplicant->setCitizenship($row['citizenship']);
		$mainapplicant->setProfileURL($row['profileUrl']);
		$mainapplicant->setMOPStatus($row['MOPStatus']);
		$mainapplicant->setHDBOwnership($row['hdbOwnership']);
		
		return $mainapplicant;
	}
	function getCoapplicant($mysql){
		$coapplicant = new FamilyProfile();
		$coapplicant->setMainApplicantnric($_SESSION['userNRIC']);
		$sql = $coapplicant->checkProfileQuery();
		$result = $mysql->query($sql);
		$NumOfRows = mysqli_num_rows($result);
		if($NumOfRows>0){
			$row = mysqli_fetch_array($result, MYSQL_ASSOC);
			$coapplicant->setNric($row['nric']);
			$coapplicant->setContactNumber($row['contactNumber']);
			$coapplicant->setFullName($row['name']);
			$coapplicant->setAddress($row['address']);
			$coapplicant->setDateOfBirth($row['dateOfBirth']);
			$coapplicant->setPostalCode($row['postalCode']);
			$coapplicant->setRelationship($row['relationship']);
			$coapplicant->setIncome($row['income']);
			$coapplicant->setHouseholdNum($row['houseHoldNum']);
			$coapplicant->setCitizenship($row['citizenship']);
			$coapplicant->setHDBOwnership($row['hdbOwnership']);
			$coapplicant->setOccupation($row['occupation']);
			return $coapplicant;
		}else{
			return null;
		}
	}
	
?>