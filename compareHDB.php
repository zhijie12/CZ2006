<?php
include("entity/UserProfile.php");
session_start();
$userProfile = unserialize($_SESSION['userProfile']);
if(!isset($_SESSION['userNRIC'])){
            header("Location: index.php"); //Redirect back
            exit();
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
             <style>
             th{
                text-align: center  !important;
                align:center !important;
                font-size: 17px;
                background-color: #F4F4F2 !important;
                color: black !important;
             }
             th,td{

                padding: 10px !important;
             }
             table{
                width:75% !important;
                align:center !important;
                text-align: center !important;
                margin-left: 10% !important;

             }
             </style>
         </head>

         <body class="flat-blue">
            <div class="app-container">
                <div class="row content-container">
                    <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-expand-toggle">
                                    <i class="fa fa-bars icon"></i>
                                </button>
                                <ol class="breadcrumb navbar-breadcrumb">
                                    <li class="active">Home</li>
                                </ol>
                                <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                                    <i class="fa fa-th icon"></i>
                                </button>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                                    <i class="fa fa-times icon"></i>
                                </button>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-envelope"></i></a>
                                    <ul class="dropdown-menu animated fadeInDown">
                                        <li class="title">
                                            Notification <span class="badge pull-right">0</span>
                                        </li>
                                        <li class="message">
                                            No new notification
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown profile">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php
                                        if($userProfile->getNric()!='nil'){
                                         echo $userProfile->getFullName(); 
                                     }else{
                                        echo "User   ";
                                    }
                                    ?><span class="caret"></span></a>
                                    <ul class="dropdown-menu animated fadeInDown">
                                        <li class="profile-img">
                                            <img src="<?php
                                            if($userProfile->getNric()!='nil'){
                                                echo $userProfile->getProfileURL(); 
                                            }else
                                            {
                                                echo "IMG/default.png";
                                            }
                                            ?>" class="profile-img">
                                        </li>
                                        <li>
                                            <div class="profile-info">
                                                <h4 class="username"><?php
                                                    if($userProfile->getNric()!='nil'){
                                                     echo $userProfile->getFullName(); 
                                                 }else{
                                                    echo "User";
                                                }
                                                ?></h4>
                                                <p><?php echo $_SESSION['userEmail']; ?> </p>
                                                <div class="btn-group margin-bottom-2x" role="group">
                                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> Profile</button>
                                                    <a href="index.php">
                                                        <button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="side-menu sidebar-inverse">
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="side-menu-container">
                                <div class="navbar-header" style="">
                                    <a class="navbar-brand" href="#" style="background-color:#5EB9FF;">
                                        <div class="icon"><img class="banner" style="width:30px;height:30px;" src="IMG/logo(S).png"></div>
                                        <div class="title">Harmonious Living @ NTU</div>
                                    </a>
                                    <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                        <i class="fa fa-times icon"></i>
                                    </button>
                                </div>
                                <ul class="nav navbar-nav">
                                    <li class="active">
                                        <a href="index.html">
                                            <span class="icon glyphicon glyphicon-home"></span><span class="title">Home</span>
                                        </a>
                                    </li>
                                    <!--HarmoniousDB tabs-->
                                    <!-- View Profile  -->
                                    <li>
                                        <a href="userprofile.php">
                                            <span class="icon glyphicon glyphicon-user"></span><span class="title">Manage My Profile</span>
                                        </a>
                                    </li>
                                    <!--End of dropdown-->  
                                    <!-- ViewCurrent  -->
                                    <li>
                                        <a href="http://www.google.com">
                                            <span class="icon glyphicon glyphicon-search"></span><span class="title">Browse Resale HDB</span>
                                        </a>
                                    </li>
                                    <!--End of dropdown-->
                                    <!-- View Past Listings  -->
                                    <li>
                                        <a href="http://facebook.com">
                                            <span class="icon glyphicon glyphicon-stats"></span><span class="title">Browse Past Trends</span>
                                        </a>
                                        <!-- Dropdown level 1 -->
                                    </li>
                                    <!--End of dropdown-->      
                                    <!-- View Past Listings  -->
                                    <li class="panel panel-default dropdown">
                                        <a data-toggle="collapse" href="#dropdown-element">
                                            <span class="icon glyphicon glyphicon-list-alt"></span><span class="title">View My Listings</span>
                                        </a>
                                        <!-- Dropdown level 1 -->
                                        <div id="dropdown-element" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul class="nav navbar-nav">
                                                    <li><a href=""><span class= "icon glyphicon glyphicon-circle-arrow-up"></span>Upload My HDB</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <!--End of dropdown-->        
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                    </div>
                    <!-- Main Content -->
                    <div class="container-fluid">
                        <div class="side-body">
                            <div class="page-title">
                                <span class="title">HDB Flat Comparison</span>
                                <!--<div class="description">A bootstrap table for display list of data.</div>-->
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card">
                                                                    <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Here is the comparison of flats you've selected:</div>
                                    </div>
                                </div>
                                        <div class="card-body">
                                            <!-- Table -->
                                            <table class="table" border="1" text-align="center" style="align:center; text-align:center;">
                                                <thead>
                                                    <tr class="info">
                                                    <th colspan=2>Resale Flats Selected</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="50%"> HDB 1</td>
                                                        <td width="50%"> HDB 2</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <th colspan="2" name="row" scope="row">HDB Area</th>
                                                        <tr/>
                                                        <td>Ang Mo Kio</td>
                                                        <td>Woodlands</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <th colspan="2">Town</th>
                                                        </tr><tr  scope="row">
                                                        <td>AMK</td>
                                                        <td>WLD</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <th scope="row" name="row"  colspan="2">Floor Area (sqft)</th>
                                                        </tr><tr  scope="row">
                                                        <td>1500 sqft</td>
                                                        <td>2000 sqft</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <th scope="row" name="row"  colspan="2">Storey</th>
                                                                                                                </tr><tr  scope="row">
                                                        <td> 5 </td>
                                                        <td> 10</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <th scope="row" name="row"  colspan="2">Lease Commence Date</th>
                                                                                                                </tr><tr  scope="row">
                                                        <td> 2 apr 2012</td>
                                                        <td> 3 apr 2013</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <th scope="row" name="row"  colspan="2">Asking Price</th>
                                                                                                                </tr><tr  scope="row">
                                                        <td>1500000</td>
                                                        <td>1203052</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <th scope="row" name="row"  colspan="2">Flat Model</th>
                                                                                                                </tr><tr  scope="row">
                                                        <td> Executive </td>
                                                        <td> 5 Room Flat </td>
                                                    </tr>
                                                    <tr class="info">
                                                        <th scope="row" name="row"  colspan="2">Flat Type</th>
                                                                                                                </tr><tr  scope="row">
                                                        <td> Apartment </td>
                                                        <td> Apartment</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <th scope="row" name="row"  colspan="2">HDB Description</th>
                                                                                                                </tr><tr  scope="row">
                                                        <td> Hello buy this now! </td>
                                                        <td> Buy this! </td>
                                                    </tr>  
                                                    <tr>
                                                        <td colspan="2" name="row"> <a href="url">Compare them on map now!</a>
                                                        </td>                                               
                                                        </td>
                                                    </tr>                                              
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="app-footer">
                    <div class="wrapper">
                  </div>
                </footer>
                <div>
                    <!-- Javascript Libs -->
                    <script type="text/javascript" src="js-dash/jquery.min.js"></script>
                    <script type="text/javascript" src="js-dash/bootstrap.min.js"></script>
                    <script type="text/javascript" src="js-dash/Chart.min.js"></script>
                    <script type="text/javascript" src="js-dash/bootstrap-switch.min.js"></script>
                    <script type="text/javascript" src="js-dash/jquery.matchHeight-min.js"></script>
                    <script type="text/javascript" src="js-dash/jquery.dataTables.min.js"></script>
                    <script type="text/javascript" src="js-dash/dataTables.bootstrap.min.js"></script>
                    <script type="text/javascript" src="js-dash/select2.full.min.js"></script>
                    <script type="text/javascript" src="js-dash/ace.js"></script>
                    <script type="text/javascript" src="js-dash/mode-html.js"></script>
                    <script type="text/javascript" src="js-dash/theme-github.js"></script>
                    <!-- Javascript -->
                    <script type="text/javascript" src="js-dash/app.js"></script>
                    <script type="text/javascript" src="js-dash/index.js"></script>
                </body>

                </html>
