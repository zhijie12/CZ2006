<?php
	include("../config.php");
	include("../../entity/UserProfile.php");
	session_start();
	$userProfile = new UserProfile();
	$previous= unserialize($_SESSION['userProfile']);
	$target_file="";
	$filename="";
	if(isset($_SESSION['userNRIC'])){
		$id = mysqli_real_escape_string($mysql,$_SESSION['userNRIC']);

		$sql = "SELECT * from UserProfile WHERE NRIC = '$id'";
		$result = mysqli_query($mysql,$sql);
		$row = mysqli_num_rows($result);
		if($row>0){
			$sql1 = "DELETE from UserProfile WHERE NRIC = '$id'";
			$mysql->query($sql1);
		}
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
	
		if (is_numeric($_POST['contactnumber']) && !empty($_POST['fullname']) && !empty($_POST['address']) 
			&& is_numeric($_POST['postalcode']) && !empty($_POST['dateofbirth']) && !empty($_POST['occupation']) 
			&& is_numeric($_POST['income']) && !empty($_POST['citizenship']) && !empty($_POST['flatEligibility'])){
							
				$userProfile->setContactNumber(mysqli_real_escape_string($mysql,strtolower($_POST['contactnumber'])));
				$userProfile->setFullName(mysqli_real_escape_string($mysql,strtolower($_POST['fullname'])));
				$userProfile->setAddress(mysqli_real_escape_string($mysql,strtolower($_POST['address'])));
				$userProfile->setDateOfBirth(mysqli_real_escape_string($mysql,strtolower($_POST['dateofbirth'])));
				$userProfile->setPostalCode(mysqli_real_escape_string($mysql,strtolower($_POST['postalcode'])));
				$userProfile->setOccupation(mysqli_real_escape_string($mysql,strtolower($_POST['occupation'])));
				$userProfile->setIncome(mysqli_real_escape_string($mysql,strtolower($_POST['income'])));
				$userProfile->setCitizenship(mysqli_real_escape_string($mysql,strtolower($_POST['citizenship'])));
				$userProfile->setFlatEligibility(mysqli_real_escape_string($mysql,strtolower($_POST['flatEligibility'])));
				$userProfile->setProfileURL(mysqli_real_escape_string($mysql,strtolower($target_file)));
				$userProfile->setNric($id);

				$sql= $userProfile->getInsertSQL();
				if ($mysql->query($sql)==true) {
						//echo "Success";
						$_SESSION['userProfile'] = serialize($userProfile);
						$array=array('userProfile','s');
						$_SESSION["fromWhere"] = $array;
						header("Location: ../../home.php");
				}else{
						$array=array('userProfile','f');
						$_SESSION["fromWhere"] = $array;
						header("Location: ../../home.php");
				}
				
			}else{
				echo $_POST['contactnumber'];
				echo "--a-";
				echo $_POST['fullname'];
				echo "---";
				echo $_POST['address'];
				echo "---";
				echo $_POST['postalcode'];
				echo "---";
				echo $_POST['occupation'];
				echo "---";
				echo $_POST['income'];
				echo "---";
				echo $_POST['citizenship'];
				echo "---";
				echo $_POST['flateligibility'];
				echo "---";
				echo $target_file;
			}
	}else{
		header("Location: ../../index.php"); //Redirect back
		exit();
	}	
?>