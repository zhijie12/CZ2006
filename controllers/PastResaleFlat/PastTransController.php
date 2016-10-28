<?php 
include("../config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="getSelectOptions"){
		$value;
		$monthArr = array();
		$townArr = array();
		$flatTypeArr = array();
		$flatModelArr = array();
		
		$sql = "SELECT DISTINCT month FROM pastresaleflattransaction ORDER BY month DESC";
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
		
		$sql = "SELECT DISTINCT flatModel FROM pastresaleflattransaction ORDER BY flatModel";
		$stmt = $mysql->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($value);
		while($stmt->fetch()){
			array_push($flatModelArr,$value);
		}
		$stmt->close();
		
		$final = array("Month"=>$monthArr,"Town"=>$townArr,"FlatType"=>$flatTypeArr,"FlatModel"=>$flatModelArr);
		$json = json_encode($final);
		echo $json;
	}
	if($_GET["action"]=="search"){
		$where = "";
		$sql = "SELECT month,town,streetName,block,flatModel,flatType,floorAreaSqm,storeyRange,leaseCommenceDate,resalePrice FROM pastresaleflattransaction ";
		//$sql = "SELECT * FROM pastresaleflattransaction where town='$_GET[town]' AND month='$_GET[month]' AND flatType='$_GET[flatType]' ORDER BY month";
		if($_GET["town"]!=""){
			$where = "";
			if($_GET["town"]!="all"){
				$town = "town='$_GET[town]'";
			}else{$town = "(1=1)";}
			if($_GET["flatType"]!="all"){
				$flatType = "flatType='$_GET[flatType]'";
			}else{$flatType = "(1=1)";}
			if($_GET["monthfrom"]!="all"){
				if($_GET["monthto"]!="all"){
					$month = "month>='$_GET[monthfrom]' AND month<='$_GET[monthto]'";
				}else{
					$month = "month>='$_GET[monthfrom]'";
				}
			}else{$month = "(1=1)";}
			if($_GET["flatModel"]!="all"){
				$flatModel = "flatModel='$_GET[flatModel]'";
			}else{$flatModel = "(1=1)";}
			if($_GET["LeaseCommenceYear"]!=""){
			$LeaseCommenceYear = "leaseCommenceDate >= $_GET[LeaseCommenceYear]";
			}else{$LeaseCommenceYear="(1=1)";}
			if($_GET["price"]!=""){
			$price = "resalePrice <= $_GET[price]";
			}else{$price="(1=1)";}
			$where = " where ".$town." AND ".$flatType." AND ".$month. " AND ".$flatModel." AND ".$LeaseCommenceYear." AND ".$price;
			$sql = $sql.$where." ORDER BY month DESC";
		}else{
			$sql = "SELECT month,town,streetName,block,flatModel,flatType,floorAreaSqm,storeyRange,leaseCommenceDate,resalePrice FROM pastresaleflattransaction ORDER BY month DESC LIMIT 50";
		}
		//raw data
		$result = $mysql->query($sql);
		$resultarray = mysqli_fetch_all($result,MYSQLI_NUM);

		//statistics
		$sql = "select month,AVG(resalePrice) as AvgPrice, count(*) from pastresaleflattransaction ".$where." GROUP BY month";
		//print_r($sql);
		$result = $mysql->query($sql);
		$statisticArray = mysqli_fetch_all($result,MYSQLI_NUM);
		$final = array("draw"=>1,"recordsTotal"=>count($resultarray),"recordsFiltered"=>count($resultarray),"data"=>$resultarray,"statistics"=>$statisticArray);
		$json = json_encode($final);
		echo $json;
	}
}
	
?>