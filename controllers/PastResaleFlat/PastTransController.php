<?php 
include_once("../../DAO/mysql/PastTransactionDAO.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="getSelectOptions"){
		$value;
		$monthArr = PastTransactionDAO::getMonths($mysql);
		$townArr = PastTransactionDAO::getTown($mysql);
		$flatTypeArr = PastTransactionDAO::getFlatType($mysql);
		$flatModelArr = PastTransactionDAO::getFlatModel($mysql);

		$final = array("Month"=>$monthArr,"Town"=>$townArr,"FlatType"=>$flatTypeArr,"FlatModel"=>$flatModelArr);
		$json = json_encode($final);
		echo $json;
	}
	if($_GET["action"]=="search"){
		//raw data
		if($_GET['town']!=""){
			$resultarray = PastTransactionDAO::getFilteredPastResaleFlat($mysql,$_GET['town'],$_GET['flatType'],$_GET['monthfrom'],$_GET['monthto'],$_GET['flatModel'],$_GET['LeaseCommenceYear'],$_GET['price']);
			$statisticArray = PastTransactionDAO::getStatistics($mysql,$_GET['town'],$_GET['flatType'],$_GET['monthfrom'],$_GET['monthto'],$_GET['flatModel'],$_GET['LeaseCommenceYear'],$_GET['price']);
		}else{
			$resultarray = PastTransactionDAO::getFilteredPastResaleFlat($mysql,"","","","","","","");
			$statisticArray = PastTransactionDAO::getStatistics($mysql,"","","","","","","");
		}
		$final = array("draw"=>1,"recordsTotal"=>count($resultarray),"recordsFiltered"=>count($resultarray),"data"=>$resultarray,"statistics"=>$statisticArray);
		$json = json_encode($final);
		echo $json;
	}
}
	
?>