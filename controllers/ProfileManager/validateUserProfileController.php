<?php
	include_once("../../DAO/mysql/UserProfileDAO.php");
	include_once("validateEligibilityStatusController.php");
	session_start();
	$userProfile = new UserProfile();
	$previous= unserialize($_SESSION['userProfile']);
	$target_file="";
	$filename="";
	if(isset($_SESSION['userNRIC'])){
		$id = mysqli_real_escape_string($mysql,$_SESSION['userNRIC']);
		if (is_numeric($_POST['contactnumber']) && !empty($_POST['fullname']) && !empty($_POST['address']) 
			&& is_numeric($_POST['postalcode']) && !empty($_POST['dateofbirth']) && !empty($_POST['occupation']) 
			&& is_numeric($_POST['income']) && !empty($_POST['citizenship'])&& !empty($_POST['mop'])&& !empty($id) && !empty($_POST['hdbOwnership'])){
				
			
			if(UserProfileDAO::checkExist($mysql,$id)>0){
				UserProfileDAO::deleteProfile($mysql,$id);
			}
			//profile img into file system
			$filename = "../../IMG/".$id."/";
			if($_FILES['profilepicture']['name']){		
				if(!file_exists($filename)){
					mkdir($filename,0775);
				}		
				$target_file = "../../IMG/" . $id . "/" . basename($_FILES["profilepicture"]['name']);
				move_uploaded_file($_FILES['profilepicture']['tmp_name'],$target_file);
				//to be saved in database
				$target_file = "IMG/" . $id . "/" . basename($_FILES["profilepicture"]['name']);
			}else{
				if($row>0){
					$target_file = $previous->getProfileURL();
				}else{
					$target_file = "IMG/default.png";
				}
			}
			$userProfile->setContactNumber(mysqli_real_escape_string($mysql,strtolower($_POST['contactnumber'])));
			$userProfile->setFullName(mysqli_real_escape_string($mysql,strtolower($_POST['fullname'])));
			$userProfile->setAddress(mysqli_real_escape_string($mysql,strtolower($_POST['address'])));
			$userProfile->setDateOfBirth(mysqli_real_escape_string($mysql,strtolower($_POST['dateofbirth'])));
			$userProfile->setPostalCode(mysqli_real_escape_string($mysql,strtolower($_POST['postalcode'])));
			$userProfile->setOccupation(mysqli_real_escape_string($mysql,strtolower($_POST['occupation'])));
			$userProfile->setIncome(mysqli_real_escape_string($mysql,strtolower($_POST['income'])));
			$userProfile->setCitizenship(mysqli_real_escape_string($mysql,strtolower($_POST['citizenship'])));
			$userProfile->setProfileURL(mysqli_real_escape_string($mysql,strtolower($target_file)));
			$userProfile->setNric($id);
			$userProfile->setMOPStatus(mysqli_real_escape_string($mysql,strtolower($_POST['mop'])));
			$userProfile->setHDBOwnership(mysqli_real_escape_string($mysql,strtolower($_POST['hdbOwnership'])));
				
			if(UserProfileDAO::createProfile($mysql,$userProfile)==true){
				$eligibilitystatus = checkEligibility($mysql);
				$array=array('userProfile','s',$eligibilitystatus);
				$_SESSION['userProfile'] = serialize($userProfile);
						
				$_SESSION["fromWhere"] = $array;
				header("Location: ../../browseHDB.php");
			}else{
				$array=array('userProfile','f');
				$_SESSION["fromWhere"] = $array;
				header("Location: ../../browseHDB.php");
			}				
		}else{
			$array=array('userProfile','f');
			$_SESSION["fromWhere"] = $array;
			header("Location: ../../browseHDB.php");
		}
	}else{
		header("Location: ../../index.php"); //Redirect back
		exit();
	}	
?>