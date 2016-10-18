<?php
include("../config.php");
include("../../entity/UserProfile.php");
session_start();

	/*
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
	*/
		// Create table if not exist
		if($mysql->query("SHOW TABLES LIKE 'uploadedFlats'")!=1) 
		{
			//table does not exist
			$createTableSQL = 
            "CREATE TABLE uploadedFlats(
               ID int AUTO_INCREMENT PRIMARY KEY, 
               address text,
               town text,
               floorarea text,
               storey text,
               leaseCommence text,
               askingPrice text,
               flatType text,
               flatModel text,
               hdbDescription text
            )";
            if ($mysql->query($createTableSQL)==true) {
            	//success
            	echo "Success!!";
            }else {
            	echo "Unsuccessful!!";
            }
		}

		if (!empty($_POST['address']) && !empty($_POST['town']) && !empty($_POST['floorarea']) 
			&& !empty($_POST['storey']) && !empty($_POST['leaseCommence']) && !empty($_POST['askingPrice']) 
			&& !empty($_POST['flatType']) && !empty($_POST['flatModel']) && !empty($_POST['hdbDescription'])){

			$address = $_POST['address'];
			$town = $_POST['town']
			$floorarea = $_POST['floorarea']
			$storey = $_POST['storey']
			$leaseCommence = $_POST['leaseCommence']
			$askingPrice = $_POST['askingPrice']
			$flatType = $_POST['flatType']
			$flatModel = $_POST['flatModel']
			$hdbDescription = $_POST['hdbDescription']

			$insertSQL = 
            "INSERT INTO uploadedFlats(address, town, floorarea, storey, leaseCommence, askingPrice, flatType, flatModel, hdbDescription) 
             VALUES ()
             ";

			 /*
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
				*/

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