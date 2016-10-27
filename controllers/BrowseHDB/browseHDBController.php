<?php 
include("../config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="load"){

		$value;
		$monthArr = array();

		$sql = "select * from resaleflat";
		
		$result = $mysql->query($sql);
		$resultarray = mysqli_fetch_all($result,MYSQLI_NUM);



		$json = json_encode($resultarray);
		echo $json;
	}
}
?>