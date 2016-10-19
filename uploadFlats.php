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
</head>

<body class="flat-blue">
<?php include("sideMenu.php") ?>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title">Manage/Upload HDB Flats</span>
                       <!-- <div class="description"> Upload/Manage your HDB Flats</div>-->
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Enter the details of your Flat</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="controllers/SellerResaleFlats/manageFlatsController.php">
                                    <div class="sub-title">Address </div>
                                    <div>
                                        <input type="text" class="form-control" name="address" placeholder="e.g. Woodlands Drive 52" required>
                                    </div>
                                    <div class="sub-title">Town</div>
                                    <div>
                                        <input type="text" class="form-control" name="town" placeholder="e.g. Woodlands" required>
                                    </div>

                                    <div class="sub-title"> Floor Area (sqft) </div>
                                    <div>
                                        <input type="text" class="form-control" name="floorarea" placeholder="e.g. 1500" required>
                                    </div>

                                    <div class="sub-title"> Storey </div>
                                    <div>
                                        <input type="text" class="form-control" name="storey" placeholder="e.g. 7" required>
                                    </div>

                                    <div class="sub-title"> Lease Commence Date: </div>
                                    <div>
                                        <input type="date" class="form-control" name="leaseCommence" placeholder="" required>
                                    </div>

                                    <div class="sub-title"> Asking Price:  </div>
                                    <div>
                                        <input type="text" class="form-control" name="askingPrice" placeholder="e.g. 10000000" required>
                                    </div>


                                    <div class="sub-title"> Flat Model: </div>
                                    <div>
                                        <select name="flatType" required> 
                                            <option> 2 Room </option>
                                            <option> 3 Room </option>
                                            <option> 4 Room </option>
                                            <option> 5 Room </option>
                                            <option> Executive </option>
                                        </select>   
                                    </div>

                                    <div class="sub-title"> Flat Type: </div>
                                    <div>
                                        <select name="flatModel" required> 
                                            <option> Adjoined Flat </option>    
                                            <option> Apartment </option>
                                            <option> Improved </option>
                                            <option> Improved Maisonette </option>
                                            <option> Maisonette </option>
                                            <option> Model A </option>
                                            <option> Model A-Maisonette </option>
                                            <option> Model A2 </option>
                                            <option> Multi-Generation </option>
                                            <option> New Generation</option>
                                            <option> Premium Apartment</option>
                                            <option> Premium Maisonette</option>
                                            <option> Standard </option>
                                            <option> Terrace </option>
                                        </select>   
                                    </div>

                                    <div class="sub-title"> HDB Description </div>
                                    <div>
                                        <textarea class="form-control" name="hdbDescription" placeholder="e.g. 3 Toilet, includes aircon"   > </textarea> 
                                    </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
          <footer class="app-footer">
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
