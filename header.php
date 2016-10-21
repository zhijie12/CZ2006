<?php
       include("entity/UserProfile.php");
        session_start();
        $userProfile = unserialize($_SESSION['userProfile']);
        if(!isset($_SESSION['userNRIC'])){
            header("Location: index.php"); //Redirect back
            exit();
        }
    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $page = end($link_array);
    $pageTitle = "";
    if($page == "home.php"){
        $pageTitle="Welcome Back!";
    }else if($page == "userProfile.php"){
        $pageTitle = "Home -> <span> Manage Profile </span>";
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Harmonious Living @ NTU</title>
    <link rel="shortcut icon" type="image/x-icon" href="IMG/logo(S).png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <style>
    @import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css");</style>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/select2.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="css/dashstyle.css">
    <link rel="stylesheet" type="text/css" href="css/flat-blue.css">
