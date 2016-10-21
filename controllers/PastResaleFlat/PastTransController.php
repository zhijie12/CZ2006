<?php 
include("../config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="getSelectOptions"){
		$value;
		$monthArr = array();
		$townArr = array();
		$flatTypeArr = array();
		
		$sql = "SELECT DISTINCT month FROM pastresaleflattransaction ORDER BY month";
		$stmt = $mysql->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($value);
		while($stmt->fetch()){
			array_push($monthArr,$value);
		}
		$stmt->close();
		
		$sql = "SELECT DISTINCT town FROM pastresaleflattransaction ORDER BY town";
		$stmt = $mysql->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($value);
		while($stmt->fetch()){
			array_push($townArr,$value);
		}
		$stmt->close();
		
		$sql = "SELECT DISTINCT flatType FROM pastresaleflattransaction ORDER BY flatType";
		$stmt = $mysql->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($value);
		while($stmt->fetch()){
			array_push($flatTypeArr,$value);
		}
		$stmt->close();
		
		
		$final = array("Month"=>$monthArr,"Town"=>$townArr,"FlatType"=>$flatTypeArr);
		$json = json_encode($final);
		echo $json;
	}
	if($_GET["action"]=="search"){
		$sql = "SELECT * FROM pastresaleflattransaction ";
		$sql = "SELECT * FROM pastresaleflattransaction where town='$_GET[town]' AND month='$_GET[month]' AND flatType='$_GET[flatType]' ORDER BY month";
		if($_GET["town"]!=""){
			$where = "";
			if($_GET["town"]!="all"){
				$where = "town='$_GET[town]'";
			}
			if($_GET["flatType"]=="all"){
				$sql = "SELECT * FROM pastresaleflattransaction where town='$_GET[town]' AND month='$_GET[month]' ORDER BY month";
			}
			if($_GET["month"]=="all"){
				$sql = "SELECT * FROM pastresaleflattransaction where town='$_GET[town]' AND flatType='$_GET[flatType]' ORDER BY month";
			}
			$sql = "SELECT * FROM pastresaleflattransaction where town='$_GET[town]' AND month='$_GET[month]' AND flatType='$_GET[flatType]' ORDER BY month";
		}else{
			$sql = "SELECT * FROM pastresaleflattransaction ORDER BY month DESC LIMIT 50";
		}
		
		$result = $mysql->query($sql);
		$array = mysqli_fetch_all($result,MYSQLI_NUM);
		$final = array("draw"=>1,"recordsTotal"=>count($array),"recordsFiltered"=>count($array),"data"=>$array);
		$json = json_encode($final);
		echo $json;
	}
}
	
?>