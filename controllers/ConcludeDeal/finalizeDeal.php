<?php
include("../config.php");
session_start();
	if($_SERVER["REQUEST_METHOD"] == "GET") {
		$finalArray = array();
		//get resale information return first;
		$me= $_SESSION['userNRIC'];
		$resaleID=$_GET['resaleID'];
		$sellerID=$_GET['sellerNRIC'];
		$buyerNRIC=$_GET['buyerNRIC'];
		$sql = "Select buyerOffer,dateStarted FROM `concludeDeal` where resaleID='".$resaleID."'AND sellerNRIC='".$sellerID."' AND buyerNRIC='".$buyerNRIC."' AND dealStatus='Accepted'";
		$result= $mysql->query($sql);
		$resultArray= mysqli_fetch_all($result,MYSQLI_NUM);
		if(count($resultArray)>0){
			$offerPrice=$resultArray[0][0];
			$offerDate=$resultArray[0][1];
			$sql = "Select `imgUrl`,`address`,`flatType`,`storey`,`floorArea`,`leaseCommenceDate`,`price`,`hdbDescription` FROM `resaleflat`where resaleID='".$resaleID."'";
			$result= $mysql->query($sql);
			$resultArray= mysqli_fetch_all($result,MYSQLI_NUM);

			$finalArray[0][0]='<img src="' . $resultArray[0][0] . '" width="128" height="128">';
			$finalArray[0][1]=$resultArray[0][1];
			$finalArray[0][2]=$resultArray[0][2];
			$finalArray[0][3]=$resultArray[0][3];
			$finalArray[0][4]=$resultArray[0][4];
			$finalArray[0][5]=$resultArray[0][5];
			$finalArray[0][6]="$".$resultArray[0][6]; 
			$finalArray[0][7]=$resultArray[0][7];

			//retrieve owner information
			$sql = "Select nric,name,address,postalCode,dateOfBirth, citizenship,MOPStatus,hdbOwnership,profileUrl,contactNo FROM `mainapplicant`where nric='".$sellerID."'";
			$result= $mysql->query($sql);
			$resultArray= mysqli_fetch_all($result,MYSQLI_NUM);

			$finalArray[1][0]=$resultArray[0][0];
			$finalArray[1][1]=$resultArray[0][1];
			$finalArray[1][2]=$resultArray[0][2];
			$finalArray[1][3]=$resultArray[0][3];
			$finalArray[1][4]=$resultArray[0][4];
			$finalArray[1][5]=$resultArray[0][5];
			$finalArray[1][6]=$resultArray[0][6]; 
			$finalArray[1][7]=$resultArray[0][7];
			$finalArray[1][8]='<img src="' . $resultArray[0][8] . '" width="128" height="128">';
			$finalArray[1][9]=$resultArray[0][9];

			//retrive buyer information
			$sql = "Select nric,name,address,postalCode,dateOfBirth, citizenship,MOPStatus,hdbOwnership,profileUrl,contactNo FROM `mainapplicant`where nric='".$buyerNRIC."'";
			$result= $mysql->query($sql);
			$resultArray= mysqli_fetch_all($result,MYSQLI_NUM);

			$finalArray[2][0]=$resultArray[0][0];
			$finalArray[2][1]=$resultArray[0][1];
			$finalArray[2][2]=$resultArray[0][2];
			$finalArray[2][3]=$resultArray[0][3];
			$finalArray[2][4]=$resultArray[0][4];
			$finalArray[2][5]=$resultArray[0][5];
			$finalArray[2][6]=$resultArray[0][6]; 
			$finalArray[2][7]=$resultArray[0][7];
			$finalArray[2][8]='<img src="' . $resultArray[0][8] . '" width="128" height="128">';
			$finalArray[2][9]=$resultArray[0][9]; 
			$finalArray[2][10]="$".$offerPrice;
			$finalArray[2][11]=$offerDate;

			//retrieve co-applicant information
			$sql = "Select nric,name,contactNumber,relationship,houseHoldNum,dateOfBirth, citizenship,hdbOwnership FROM `coapplicant`where mainApplicantNRIC='".$buyerNRIC."'";
			$result= $mysql->query($sql);
			$resultArray= mysqli_fetch_all($result,MYSQLI_NUM);
			if(count($resultArray)>0){
				$finalArray[3][0]=$resultArray[0][0];
				$finalArray[3][1]=$resultArray[0][1];
				$finalArray[3][2]=$resultArray[0][2];
				$finalArray[3][3]=$resultArray[0][3];
				$finalArray[3][4]=$resultArray[0][4];
				$finalArray[3][5]=$resultArray[0][5];
				$finalArray[3][6]=$resultArray[0][6]; 
				$finalArray[3][7]=$resultArray[0][7];
			}else
			{
				$finalArray[3][0]="NULL";
			}
		$sql = "Select buyerOffer,dateStarted FROM `concludeDeal` where resaleID='".$resaleID."'AND sellerNRIC='".$sellerID."' AND buyerNRIC='".$buyerNRIC."' AND dealStatus='Accepted' AND dateEnded IS NULL";
		$result= $mysql->query($sql);
		$resultArray= mysqli_fetch_all($result,MYSQLI_NUM);
		if(count($resultArray)>0){
			$finalArray[4][0]="true"; //displayform
		}else{
			$finalArray[4][0]="false"; //printforms
		}
		if($me==$buyerNRIC){
			$finalArray[4][1]="buyer";
		}else{
			$finalArray[4][1]="seller";
		}

	}else{
		header("Location: index.php"); //Redirect back
        exit();
	}		
		$final = array("draw"=>1,"recordsTotal"=>count($finalArray),"recordsFiltered"=>count($finalArray),"data"=>$finalArray);
		$json = json_encode($finalArray);
		echo $json;
}else{
		$resaleID=$_GET['resaleID'];
		$sellerID=$_GET['sellerNRIC'];
		$buyerNRIC=$_GET['buyerNRIC'];
		$submitType=$_POST['submitType'];
		if($submitType=="Accept"){
			//Accept
			$updateSQL = "update concludeDeal set dateEnded=NOW() where resaleID=".$resaleID." AND sellerNRIC = '".$sellerID."' AND buyerNRIC = '".$buyerNRIC."'";
			if ($mysql->query($updateSQL)==true){ 
				$array=array('makeFinalOffer','s');
			}else{
				$array=array('makeFinalOffer','f');
			}
			$_SESSION["fromWhere"] = $array;
		}else{
			$updateSQL = "update concludeDeal set dealStatus='buyerOffer', dateEnded=NULL where resaleID=".$resaleID."";
			$updateSQL2 = "update resaleflat set concluded=0 where resaleID=".$resaleID."";

			if ($mysql->query($updateSQL)==true && $mysql->query($updateSQL2)){ 
				$array=array('makeFinalOffer','s');
			}else{
				$array=array('makeFinalOffer','f');
			}
			$_SESSION["fromWhere"] = $array;
		}

		header("Location: ../../ViewAllDeals.php");	

}
?>
