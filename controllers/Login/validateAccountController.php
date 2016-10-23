<?php
include("../config.php");
include("../../entity/UserAccount.php");
include("../../entity/UserProfile.php");
	//populate entity
$userAcc = new UserAccount();
$userProfile= new UserProfile();
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$user = mysqli_real_escape_string($mysql,$_POST['nric']);
	$userAcc->setNric($user);
	$userAcc->setPassword($_POST["password"]);
	$sql = $userAcc->getLoginQuery();
		$result = mysqli_query($mysql,$sql); //query the database with the condition, and storing it into a variable
		$row = mysqli_num_rows($result);
		if($row>0){
			$col = mysqli_fetch_array($result, MYSQLI_ASSOC);

			if($result && password_verify($_POST["password"],$col["password"])){
				//Retrieve user profileinfomation and pass it as object
				$userProfile->setNric($user);
				$sql= $userProfile->checkProfileQuery();

				$result2 = mysqli_query($mysql,$sql)or die( mysqli_error($mysql) ); //DIED HERE

				if($result2== true){
					$num_rows = mysqli_num_rows($result2);
					$row = mysqli_fetch_array($result2, MYSQL_ASSOC);
					if($num_rows>0){
						//if profile is created.
						$userProfile->setContactNumber($row['contactNo']);
						$userProfile->setFullName($row['name']);
						$userProfile->setAddress($row['address']);
						$userProfile->setDateOfBirth($row['dateOfBirth']);
						$userProfile->setPostalCode($row['postalCode']);
						$userProfile->setOccupation($row['occupation']);
						$userProfile->setIncome($row['income']);
						$userProfile->setCitizenship($row['citizenship']);
						$userProfile->setProfileURL($row['profileUrl']);
						$userProfile->setNric($user);
						$userProfile->setMOPStatus($row['MOPStatus']);
						$userProfile->setHDBOwnership($row['hdbOwnership']);

					}else{
						$userProfile->setNric("nil");
					}
					$_SESSION["fromWhere"] = array('Login','s1');
					$_SESSION['userNRIC']= $col['NRIC'];
					$_SESSION['userEmail']= $col['email'];
					$_SESSION['userProfile'] = serialize($userProfile);
					header("Location: ../../home.php");
				}else{
					echo "no results";
				}
			}else{

				header("Location: ../../index.php?error=e4");

				exit();
			}
		}else{
			header("Location: ../../index.php?error=e4");
			exit();
		}
	}
	?>