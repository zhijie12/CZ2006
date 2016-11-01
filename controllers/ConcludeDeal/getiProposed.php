<?php 
include("../config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="proposed2me"){

		$buyerNRIC = $_SESSION['userNRIC'];

		$sql ="SELECT imgUrl, address, flatType, storey, floorArea, leaseCommenceDate, price, email, hdbDescription ,buyerOffer, dealStatus, resaleflat.ownerNRIC, resaleflat.resaleID
		FROM resaleflat 
		INNER JOIN UserAccounts on resaleflat.ownerNRIC = UserAccounts.nric
		INNER JOIN concludeDeal on resaleflat.resaleID=concludeDeal.resaleID
		Where concludeDeal.buyerNRIC='".$buyerNRIC."'";
		
		$result = $mysql->query($sql);
		$resultarray = mysqli_fetch_all($result,MYSQLI_NUM);
		$finalResult= array();
		for ($i=0; $i<count($resultarray);$i++){
				$finalResult[$i]= array();
				$finalResult[$i][0]='
				<img src="'.$resultarray[$i][0] . '" width="128" height="128">';
				$finalResult[$i][1]=$resultarray[$i][1];
				$finalResult[$i][2]=$resultarray[$i][2];
				$finalResult[$i][3]=$resultarray[$i][3];
				$finalResult[$i][4]=$resultarray[$i][4];
				$finalResult[$i][5]=$resultarray[$i][5];
				$finalResult[$i][6]=$resultarray[$i][6];
				$finalResult[$i][7]=$resultarray[$i][7];
				$finalResult[$i][8]=$resultarray[$i][8];
				if($resultarray[$i][10]=='buyerOffer'){
				$finalResult[$i][10]="<p style='color:red;font-weight:bold;'>Pending Response from Seller</p>";
				}else if($resultarray[$i][10]=='Rejected'){
				$finalResult[$i][10]="<p style='color:red;font-weight:bold;'>Rejected By Seller</p>";
				}else {//accepted
				$finalResult[$i][10]="<a name='accepted' href='finalizeDeal.php?resaleID=".$resultarray[$i][12]."&buyerNRIC=".$buyerNRIC."&sellerNRIC=".$resultarray[$i][11]."'
				><span style='color:green;font-weight:bold;'>".$resultarray[$i][10]."! Click Me!</span></a>";
			}
			$finalResult[$i][9]=$resultarray[$i][9];
		}
		
		$final = array("draw"=>1,"recordsTotal"=>count($finalResult),"recordsFiltered"=>count($finalResult),"data"=>$finalResult);
		$json = json_encode($final);
		echo $json;
	}
	}