<?php
	include_once("../../DAO/mysql/UserAccountDAO.php");
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST["nric"]) && !empty($_POST["password"]) && !empty($_POST["email"])){				
			if(UserAccountDAO::checkDuplicate($mysql,$_POST["nric"])>0){
				header("Location: ../../index.php?error=e2");
			}else{
				$NRIC=$_POST["nric"];
				$PW=password_hash($_POST["password"], PASSWORD_DEFAULT);
				$EMAIL=$_POST["email"];
				if(UserAccountDAO::createAccount($mysql,$NRIC,$PW,$EMAIL)==true){
					header("Location: ../../index.php?error=s1");
				}else{
					header("Location: ../../index.php?error=e3");
				}
			}
		}else{
			header("Location: ../../index.php?error=e1");
		}
	}
		
?>