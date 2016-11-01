<?php
include("../config.php");
include("../../entity/NewResaleFlat.php");
include("../../entity/UserProfile.php");
session_start();
//$userProfile = unserialize($_SESSION['userProfile']);
$NewResaleFlat = new NewResaleFlat();



		if (!empty($_POST['address']) && !empty($_POST['town']) && !empty($_POST['floorarea']) 
			&& !empty($_POST['storey']) && !empty($_POST['leaseCommence']) && !empty($_POST['askingPrice']) 
			&& !empty($_POST['flatType']) && !empty($_POST['flatModel']) && !empty($_POST['hdbDescription'])){

		$address = $_POST['address'];
		$town = $_POST['town'];
		$floorarea = $_POST['floorarea'];
		$storey = $_POST['storey'];
		$leaseCommence = $_POST['leaseCommence'];
		$askingPrice = $_POST['askingPrice'];
		$flatType = $_POST['flatType'];
		$flatModel = $_POST['flatModel'];
		$hdbDescription = $_POST['hdbDescription'];

		date_default_timezone_set('Asia/Singapore');		
		$date = date('Y-m-d');

		//Upload image
		$target_dir = "../../IMG/hdbImage/";
		$target_file = $target_dir . basename($_FILES["hdbImage"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["hdbImage"]["tmp_name"], $target_file)) {
		    //echo "The file ". basename( $_FILES["hdbImage"]["name"]). " has been uploaded.";
		} else {
		    //echo "Sorry, there was an error uploading your file.";
		}
		

		$NewResaleFlat->setImage("IMG/hdbImage/".basename($_FILES["hdbImage"]["name"]));
		$NewResaleFlat->setAddress($address);
		$NewResaleFlat->setTown($town);
		$NewResaleFlat->setFloorArea($floorarea);
		$NewResaleFlat->setStorey($storey);
		$NewResaleFlat->setLeaseCommence($leaseCommence);
		$NewResaleFlat->setAskingPrice($askingPrice);
		$NewResaleFlat->setFlatType($flatType);
		$NewResaleFlat->setFlatModel($flatModel);
		$NewResaleFlat->setHDBDescription($hdbDescription);
		$NewResaleFlat->setDate($date);
		$NewResaleFlat->setNric($_SESSION['userNRIC']);
		
		//if no image added then retain the previous image
		if ( empty($_FILES["hdbImage"]["name"]) ){
			$insertSQL = $NewResaleFlat->getInsertSQLnoImage();
			$alterSQL = $NewResaleFlat->getAlterSQLnoImage();

		} else {
			$insertSQL = $NewResaleFlat->getInsertSQL();
			$alterSQL = $NewResaleFlat->getAlterSQL();

		}
		

		//echo ("Hello: $insertSQL");
		if ($mysql->query($insertSQL)==true){ //insert successful
	
		}else { //Already exist edit current value
			$mysql->query($alterSQL);
		}

		


		header("Location: ../../manageFlats.php");
	}else{ //redirect back to the form

	}

?>