<?php
include("../config.php");
include("../../entity/NewResaleFlat.php");
session_start();

	$NewResaleFlat = new NewResaleFlat();

/*
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
			leaseCommence date,
			askingPrice text,
			flatType text,
			flatModel text,
			hdbDescription text,
			dateSubmitted date
			)";
			if ($mysql->query($createTableSQL)==true) {
            	//success
				echo "Success!!";
			}else {
				echo "Unsuccessful!!";
			}
		}
*/
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
			//$date = date_default_timezone_get();
			$date = date('Y-m-d');

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

			$insertSQL = $NewResaleFlat->getInsertSQL();

			echo ("Hello: $insertSQL");
	

			}else{
				/*
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
				*/
			}
		
	?>