<?php 
include("../config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="load"){

		$value;
		$monthArr = array();

		$sql = "SELECT `resaleID`, `imgUrl`, `town`, `address`, `flatType`, `flatModel`, `storey`, `floorArea`, `leaseCommenceDate`, `price`, `email`, `uploadDate`, `hdbDescription` FROM `resaleflat` INNER JOIN `UserAccounts` on `ownerNRIC` = `nric`";
		
		$result = $mysql->query($sql);
		$resultarray = mysqli_fetch_all($result,MYSQLI_NUM);
		

		for ($i=0; $i<count($resultarray);$i++){

			$resultarray[$i][1] = '<img src="' . $resultarray[$i][1] . '" width="128" height="128">';
			$resultarray[$i][13] = "PLACEHOLDER for make offer";
			//echo $resultarray[$i][1];
		}
	
		$final = array("draw"=>1,"recordsTotal"=>count($resultarray),"recordsFiltered"=>count($resultarray),"data"=>$resultarray,"statistics"=>$statisticArray);
		$json = json_encode($final);
		echo $json;

	}
}
?>