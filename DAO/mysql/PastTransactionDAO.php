<?php	
include_once("../../DAO/config.php");
class PastTransactionDAO{
	public static function getFlatType($conn){
		$flatTypeArr = array();
		$sql = "SELECT DISTINCT flatType FROM pastresaleflattransaction ORDER BY flatType";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($value);
		while($stmt->fetch()){
			array_push($flatTypeArr,$value);
		}
		$stmt->close();
		return $flatTypeArr;
	}
	public static function getFlatModel($conn){
		$flatModelArr = array();
		$sql = "SELECT DISTINCT flatModel FROM pastresaleflattransaction ORDER BY flatModel";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($value);
		while($stmt->fetch()){
			array_push($flatModelArr,$value);
		}
		$stmt->close();
		return $flatModelArr;
	}
	public static function getTown($conn){
		$townArr = array();
		$sql = "SELECT DISTINCT town FROM pastresaleflattransaction ORDER BY town";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($value);
		while($stmt->fetch()){
			array_push($townArr,$value);
		}
		$stmt->close();
		return $townArr;
	}
	public static function getMonths($conn){
		$monthArr = array();
		$sql = "SELECT DISTINCT month FROM pastresaleflattransaction ORDER BY month DESC";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($value);
		while($stmt->fetch()){
			array_push($monthArr,$value);
		}
		$stmt->close();
		return $monthArr;
	}
	public static function getFilteredPastResaleFlat($conn,$townV,$flatTypeV,$monthfromV,$monthtoV,$flatModelV,$LeaseCommenceYearV,$priceV){
		$where = "";
		$sql = "SELECT month,town,streetName,block,flatModel,flatType,floorAreaSqm,storeyRange,leaseCommenceDate,resalePrice FROM pastresaleflattransaction ";
		if($townV!=""){
			$where = "";
			if($townV!="all"){
				$town = "town='$townV'";
			}else{$town = "(1=1)";}
			
			if($flatTypeV!="all"){
				$flatType = "flatType='$flatTypeV'";
			}else{$flatType = "(1=1)";}
			
			if($monthfromV!="all"){
				if($monthtoV!="all"){
					$month = "month>='$monthfromV' AND month<='$monthtoV'";
				}else{
					$month = "month>='$monthfromV'";
				}
			}else{$month = "(1=1)";}
			
			if($flatModelV!="all"){
				$flatModel = "flatModel='$flatModelV'";
			}else{$flatModel = "(1=1)";}
			
			if($LeaseCommenceYearV!=""){
			$LeaseCommenceYear = "leaseCommenceDate >= $LeaseCommenceYearV";
			}else{$LeaseCommenceYear="(1=1)";}
			
			if($priceV!=""){
			$price = "resalePrice <= $priceV";
			}else{$price="(1=1)";}
			
			$where = " where ".$town." AND ".$flatType." AND ".$month. " AND ".$flatModel." AND ".$LeaseCommenceYear." AND ".$price;
			$sql = $sql.$where." ORDER BY month DESC";
		}else{
			$sql = "SELECT month,town,streetName,block,flatModel,flatType,floorAreaSqm,storeyRange,leaseCommenceDate,resalePrice FROM pastresaleflattransaction ORDER BY month DESC LIMIT 50";
		}
		//raw data
		$result = $conn->query($sql);
		$resultarray = mysqli_fetch_all($result,MYSQLI_NUM);
		
		return $resultarray;
	}
	public static function getStatistics($conn,$townV,$flatTypeV,$monthfromV,$monthtoV,$flatModelV,$LeaseCommenceYearV,$priceV){
		$where = "";
		$sql = "SELECT month,town,streetName,block,flatModel,flatType,floorAreaSqm,storeyRange,leaseCommenceDate,resalePrice FROM pastresaleflattransaction ";
		if($townV!=""){
			$where = "";
			if($townV!="all"){
				$town = "town='$townV'";
			}else{$town = "(1=1)";}
			
			if($flatTypeV!="all"){
				$flatType = "flatType='$flatTypeV'";
			}else{$flatType = "(1=1)";}
			
			if($monthfromV!="all"){
				if($monthtoV!="all"){
					$month = "month>='$monthfromV' AND month<='$monthtoV'";
				}else{
					$month = "month>='$monthfromV'";
				}
			}else{$month = "(1=1)";}
			
			if($flatModelV!="all"){
				$flatModel = "flatModel='$flatModelV'";
			}else{$flatModel = "(1=1)";}
			
			if($LeaseCommenceYearV!=""){
			$LeaseCommenceYear = "leaseCommenceDate >= $LeaseCommenceYearV";
			}else{$LeaseCommenceYear="(1=1)";}
			
			if($priceV!=""){
			$price = "resalePrice <= $priceV";
			}else{$price="(1=1)";}
			
			$where = " where ".$town." AND ".$flatType." AND ".$month. " AND ".$flatModel." AND ".$LeaseCommenceYear." AND ".$price;
		}
		//$sql = "select month,AVG(resalePrice) as AvgPrice, count(*) from pastresaleflattransaction ".$where." GROUP BY month";
		$sql = "select month,AVG(resalePrice) as AvgPrice from pastresaleflattransaction ".$where." GROUP BY month";
		$result = $conn->query($sql);
		$resultarray = mysqli_fetch_all($result,MYSQLI_NUM);
		
		return $resultarray;
	}
}
?>