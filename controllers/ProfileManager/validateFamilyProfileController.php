<?php
include("../config.php");
	include("../../entity/FamilyProfile.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="getCurrentInfo"){
		$rowCount=0;
		$value;
		$id = mysqli_real_escape_string($mysql,$_SESSION['userNRIC']);
		$coApplicantInfo = array();
		$sql = "SELECT * FROM coapplicant where mainApplicantNRIC = '$id'";
		$result = $mysql->query($sql);
		$array = mysqli_fetch_all($result,MYSQLI_NUM);

		$final = array("data"=>$array);
		$json = json_encode($final);
		echo $json;
	}
}else{
	$id = mysqli_real_escape_string($mysql,$_SESSION['userNRIC']);
	$sql = "SELECT * from coapplicant WHERE mainApplicantNRIC = '$id'";
	$result = mysqli_query($mysql,$sql);
	$row = mysqli_num_rows($result);
	if($row>0){
		$sql1 = "DELETE from coapplicant WHERE mainApplicantNRIC = '$id'";
		$mysql->query($sql1);
	}
	$familyProfile = new FamilyProfile();
	$familyProfile->setNric($_POST['nric']);
	$familyProfile->setContactNumber($_POST['contactnumber']);
	$familyProfile->setFullName($_POST['fullname']);
	$familyProfile->setAddress($_POST['address']);
	$familyProfile->setDateOfBirth($_POST['dateofbirth']);
	$familyProfile->setPostalCode($_POST['postalcode']);
	$familyProfile->setRelationship($_POST['relationships']);
	$familyProfile->setIncome($_POST['income']);
	$familyProfile->setHouseholdNum($_POST['household']);
	$familyProfile->setCitizenship($_POST['citizenship']);
	$familyProfile->setHDBOwnership($_POST['hdbOwnership']);
	$familyProfile->setOccupation($_POST['occupation']);
	$familyProfile->setMainApplicantnric($id);
	$sql= $familyProfile->getInsertSQL();
	//echo $sql;
	if ($mysql->query($sql)==true) {
		//echo "Success";
		//$_SESSION['userProfile'] = serialize($userProfile);
		$array=array('familyProfile','s');
		$_SESSION["fromWhere"] = $array;
		header("Location: ../../home.php");
	}else{
		$array=array('familyProfile','f');
		$_SESSION["fromWhere"] = $array;
		header("Location: ../../home.php");
	}
}
?>