<?php
	include("../config.php");
	include("../../entity/UserAccount.php");
	$userAcc = new UserAccount();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST["nric"]) && !empty($_POST["password"]) && !empty($_POST["email"])){
				$user = mysqli_real_escape_string($mysql,$_POST['nric']);
				$password = mysqli_real_escape_string($mysql,$_POST['password']);
				$userAcc->setNric($user);
				//$userAcc->setPassword($_POST["password"]);
				$sql = $userAcc->getLoginQuery();
				$result = mysqli_query($mysql,$sql); //query the database with the condition, and storing it into a variable
				$row = mysqli_num_rows($result);
			if($row==1){
				header("Location: ../../index.php?error=e2");
			}else{
				$tempPwd=password_hash($password, PASSWORD_DEFAULT);
				$userAcc->setEmail($_POST["email"]);
				$userAcc->setPassword($tempPwd);
				$insertSql= $userAcc->getNewAccSQL();
				if ($mysql->query($insertSql)==true){
						header("Location: ../../index.php?error=s1");
					}else{
						echo $insertSql;
						header("Location: ../../index.php?error=e3");
					}
			}
		}else{
			header("Location: ../../index.php?error=e1");
		}
	}
		
?>