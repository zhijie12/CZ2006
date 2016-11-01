<?php include("header.php") ?>
<?php
    //Will be added into include file
    include("controllers/config.php");
    session_start();
    $userProfile = unserialize($_SESSION['userProfile']);
    if(!isset($_SESSION['userNRIC'])){
        header("Location: index.php"); //Redirect back
        exit();
    }

    //Populate form with previously entered data
    $userNRIC = $_SESSION['userNRIC'];
    $sql = "SELECT * FROM `resaleflat` WHERE `ownerNRIC` = '$userNRIC'";
    $result = $mysql->query($sql);
    $row = $result->fetch_assoc();
    
    $town = $row['town'];
    $address = $row['address'];
    $floorarea = $row['floorArea'];
    $storey = $row['storey'];
    $leaseCommence = $row['leaseCommenceDate'];
    $price = $row['price'];
    $flatType = $row['flatType'];
    $flatModel= $row['flatModel'];
    $hdbDescription= $row['hdbDescription'];
    $img = $row['imgUrl']
?>

<style type="text/css">     
    select {
        width:200px;
    }
</style>

<!DOCTYPE html>
<html>

<script type="text/javascript">
  document.getElementById('flatType').value = $flatType;
  document.getElementById('flatModel').value = $flatModel;
</script>

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
<?php include("menu.php") ?>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title"><span class= "icon glyphicon glyphicon-circle-arrow-up" style="padding-right: 15px;"></span>Enter the details of your Flat</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <?php
                                    if(isset($_SESSION["fromWhere"])){
                                        $incomingArr = $_SESSION["fromWhere"];  
                                        if($incomingArr[0]=='manageFlat' && $incomingArr[1]=='s'){
                                            echo "
                                            <div class=\"isa_success\">
                                               <i class=\"fa fa-check\"></i>
                                               Your HDB Flat have been submitted successfully!
                                           </div>";
                                       }else if($incomingArr[0]=='manageFlat' && $incomingArr[1]=='u'){
                                            echo "
                                            <div class=\"isa_success\">
                                               <i class=\"fa fa-check\"></i>
                                               Your HDB Flat have been updated successfully!
                                           </div>";
                                       }else if($incomingArr[0]=='manageFlat' && $incomingArr[1]=='f'){
                                            echo "
                                            <div class=\"isa_error\">
                                               <i class=\"fa fa-check\"></i>
                                               Your HDB Flat have failed to submit! Please check your input! 
                                           </div>";
                                       }
                                       $_SESSION["fromWhere"] = null;  //Clear it so it won't keep get stuck! 
                                    }
                                ?>

                                    <form method="post" action="controllers/SellerResaleFlats/manageFlatsController.php" enctype="multipart/form-data">
                                    <div class="sub-title">HDB Image </div>
                                    <div> 
                                        <?php 
                                            if($img!='nil'){
                                                 echo "Current picture: <br/> <img style=\"width:30%; length:30%;\" src='".$img."' />";
                                              }
                                        ?>
                                    <input type="file" name="hdbImage" accept="image/*">
                                    </div>
                                    <div class="sub-title">Address </div>
                                    <div>
                                        <input type="text" class="form-control" name="address" placeholder="e.g. Woodlands Drive 52" 
                                        value="<?php echo "$address"; ?>" required>
                                    </div>
                                    <div class="sub-title">Town</div>
                                    <div>
                                        <input type="text" class="form-control" name="town" placeholder="e.g. Woodlands"
                                        value="<?php echo "$town"; ?>" required>
                                    </div>

                                    <div class="sub-title"> Floor Area (sqft) </div>
                                    <div>
                                        <input type="text" class="form-control" name="floorarea" placeholder="e.g. 1500" 
                                        value="<?php echo "$floorarea"; ?>" required>
                                    </div>

                                    <div class="sub-title"> Postal Code </div>
                                    <div>
                                        <input type="text" class="form-control" name="storey" placeholder="e.g. 569956" 
                                        value="<?php echo "$storey"; ?>"required>
                                    </div>

                                    <div class="sub-title"> Lease Commence Date: </div>
                                    <div>
                                        <input type="date" class="form-control" name="leaseCommence" placeholder="" 
                                        value="<?php echo "$leaseCommence"; ?>"required>
                                    </div>

                                    <div class="sub-title"> Asking Price:  </div>
                                    <div>
                                        <input type="text" class="form-control" name="askingPrice" placeholder="e.g. 10000000" 
                                        value="<?php echo "$price"; ?>" required>
                                    </div>


                                    <div class="sub-title"> Flat Model: </div>
                                    <div> 
                                        <select name="flatType" id="flatType" required> 
                                            <option <?php if($flatType == "2 Room") { echo "selected=selected";} ?> 
                                            value="2 Room"> 2 Room </option>

                                            <option <?php if($flatType == "3 Room") { echo "selected=selected";} ?> 
                                            value="3 Room"> 3 Room </option>

                                            <option <?php if($flatType == "4 Room") { echo "selected=selected";} ?> 
                                            value="4 Room"> 4 Room </option>

                                            <option <?php if($flatType == "5 Room") { echo "selected=selected";} ?> 
                                            value="5 Room"> 5 Room </option>

                                            <option <?php if($flatType == "Executive") { echo "selected=selected";} ?> 
                                            value="Executive"> Executive </option>
                                        </select>                                   
                                        
                                    </div>

                                    <div class="sub-title"> Flat Type: </div>
                                    <div>
                                        <select name="flatModel" id="flatModel" required > 
                                            <option <?php if ($flatModel == "Adjoined Flat") { echo "selected=selected"; } ?> 
                                            value="Adjoined Flat" > Adjoined Flat </option>    

                                            <option <?php if ($flatModel == "Apartment") { echo "selected=selected"; } ?> 
                                            value="Apartment" > Apartment </option>

                                            <option <?php if ($flatModel == "Improved") { echo "selected=selected"; } ?> 
                                            value="Improved" > Improved </option>

                                            <option <?php if ($flatModel == "Improved Maisonette") { echo "selected=selected"; } ?> 
                                            value="Improved Maisonette" > Improved Maisonette </option>

                                            <option <?php if ($flatModel == "Maisonette") { echo "selected=selected"; } ?> 
                                            value="Maisonette" > Maisonette </option>

                                            <option <?php if ($flatModel == "Model A") { echo "selected=selected"; } ?> 
                                            value="Model A" > Model A </option>

                                            <option <?php if ($flatModel == "Model A-Maisonette") { echo "selected=selected"; } ?> 
                                            value="Model A-Maisonette" > Model A-Maisonette </option>

                                            <option <?php if ($flatModel == "Model A2") { echo "selected=selected"; } ?> 
                                            value="Model A2" > Model A2 </option>

                                            <option <?php if ($flatModel == "Multi-Generation") { echo "selected=selected"; } ?> 
                                            value="Multi-Generation" > Multi-Generation </option>

                                            <option <?php if ($flatModel == "New Generation") { echo "selected=selected"; } ?> 
                                            value="New Generation" > New Generation</option>

                                            <option <?php if ($flatModel == "Premium Apartment") { echo "selected=selected"; } ?> 
                                            value="Premium Apartment" > Premium Apartment</option>

                                            <option <?php if ($flatModel == "Premium Maisonette") { echo "selected=selected"; } ?> 
                                            value="Premium Maisonette" > Premium Maisonette</option>

                                            <option <?php if ($flatModel == "Standard") { echo "selected=selected"; } ?> 
                                            value="Standard" > Standard </option>

                                            <option <?php if ($flatModel == "Terrace") { echo "selected=selected"; } ?> 
                                            value="Terrace" > Terrace </option>

                                        </select>   
                                    </div>

                                    <div class="sub-title"> HDB Description </div>
                                    <div>
                                        <textarea class="form-control" name="hdbDescription" placeholder="e.g. 3 Toilet, includes aircon"   
                                        ><?php echo "$hdbDescription";?></textarea> 
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
</body>

</html>
