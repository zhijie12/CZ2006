<?php
include("../config.php");
include("../../entity/NewResaleFlat.php");
include_once("../../DAO/mysql/resaleHdbDAO.php");
session_start();
//$userProfile = unserialize($_SESSION['userProfile']);
if($_SERVER["REQUEST_METHOD"] == "POST") {
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
		
		if ( empty($_FILES["hdbImage"]["name"]) ){
			if (resaleHdbDAO::createResaleFlat_WOImage($mysql,$NewResaleFlat)==true){ //insert successful
				$array=array('manageFlat','s'); //Insert Success
			}else if (resaleHdbDAO::updateResaleFlat_WOImage($mysql,$NewResaleFlat)==true){ //Already exist edit current value
				$array=array('manageFlat','u'); //Updated
			}else{
				$array=array('manageFlat','f'); //FAILED
			}
		} else {
			if (resaleHdbDAO::createResaleFlat_WImage($mysql,$NewResaleFlat)==true){ //insert successful
				$array=array('manageFlat','s'); //Insert Success
			}else if (resaleHdbDAO::updateResaleFlat_WImage($mysql,$NewResaleFlat)==true){ //Already exist edit current value
				$array=array('manageFlat','u'); //Updated
			}else{
				$array=array('manageFlat','f'); //FAILED
			}
		}
		
		$_SESSION["fromWhere"] = $array;
		header("Location: ../../manageFlats.php");
	}else{ //redirect back to the form
		$array=array('manageFlat','f'); //FAILED
		$_SESSION["fromWhere"] = $array;
		header("Location: ../../manageFlats.php");
	}
}
?>