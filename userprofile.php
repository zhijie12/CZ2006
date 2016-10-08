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

    <script>
        function validateForm() {
            var outputMsg="";
            var vnric = document.getElementsByName("nric")[0].value;
            var vcontactnumber = document.getElementsByName("contactnumber")[0].value;
            var vfullname = document.getElementsByName("fullname")[0].value;
            var vaddress = document.getElementsByName("address")[0].value;
            var vdateofbirth = document.getElementsByName("dateofbirth")[0].value;
            var vpostalcode = document.getElementsByName("postalcode")[0].value;
            var vincome = document.getElementsByName("income")[0].value;
            var vcitizenship = document.getElementsByName("citizenship")[0].value;
            var vflageligibility = document.getElementsByName("flageligibility")[0].value;
            var vprofilepicture = document.getElementsByName("profilepicture")[0].value;
            if (vnric == null || vnric == "") {
                outputMsg=outputMsg + "- NRIC field is empty<br />";
            }
            if (vfullname == null || vfullname== "") {
                outputMsg=outputMsg + "- Name field is empty<br />";
            }
             if (vdateofbirth == null || vdateofbirth == "") {
                outputMsg=outputMsg + "- Date of birth field is empty <br />";
            }
             if (vprofilepicture == null || vprofilepicture == "") {
                outputMsg= outputMsg + "- Profile picture field is empty <br />";
            } 
            if (vcitizenship == null || vcitizenship == "") {
                outputMsg=outputMsg + "- citizenship field is not selected<br />";
            }
            if (vcontactnumber == null || vcontactnumber == "") {
                outputMsg=outputMsg + "- Contact number field is empty <br />";
            }
            if (vaddress == null || vaddress == "") {
                outputMsg=outputMsg + "- Address field is empty <br />";
            }
            if (vpostalcode == null || vpostalcode == "") {
                outputMsg=outputMsg + "- Postal Code field is empty <br />";
            }
            if (vincome == null || vincome == "") {
                outputMsg=outputMsg + "- Income field is empty<br />";
            }

            if (vflageligibility == null || vflageligibility == "") {
                outputMsg=outputMsg +  "- Flat Eligibility  field is empty<br />";
            }

            if(outputMsg == null || outputMsg == ""){
                return true;
            }else{
                 document.getElementsByName("isa_error")[0].style.display = "block";
                 document.getElementsByName("error_para")[0].innerHTML ='<i class="fa fa-times-circle" style="align:left"></i>'+'There are validation errors when submiting the form: <br/><div style="align:right;padding-left:8%;">'+outputMsg+"</div>";
                 $('html, body').animate({ scrollTop: 0 }, 'slow');
             }
            return false;
        }
</script>

</head>

<body class="flat-blue">
<?php include("sideMenu.php") ?>
 <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title"><span class="icon glyphicon glyphicon-user"></span>  Manage My Profile</span>
                       <!-- <div class="description">A ui elements use in form, input, select, etc.</div>-->
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Please enter your profile details:</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--This portion is to do validation check and out put details-->
                                        <div class="isa_error" name="isa_error" style="display:none;">
                                                <p name="error_para">
                                                    Your Profile has not been saved successfully.
                                                    </p>
                                                </div>
                                 <form onsubmit="return validateForm()"  action="controllers/ProfileManager/validateUserProfileController.php" method="POST" enctype="multipart/form-data" >
                                    <div class="sub-title">NRIC: 
                                    </div>
                                    <div>
                                 <input type="text" name="nric" class="form-control"  placeholder='<?php echo $_SESSION['userNRIC']; ?>' readOnly="true" value="<?php echo $_SESSION['userNRIC']; ?>" >

                                    </div>

                                    <div class="sub-title">Full Name:</div>
                                    <div>
                                        <input type="text" class="form-control" name="fullname" class="form-control" placeholder="Enter your name." value="<?php 
                                        if($userProfile->getNric()!='nil'){
                                           echo $userProfile->getFullName();
                                        }else
                                            echo "";
                                        ?>"
                                        >
                                    </div>

                                    <div class="sub-title">Date of Birth:</div>
                                    <div>
                                        <input type="date" name="dateofbirth" class="form-control"
                                         value="<?php 
                                        if($userProfile->getNric()!='nil'){
                                           echo $userProfile->getDateOfBirth();
                                        }else
                                            echo "";
                                        ?>"
                                        >
                                    </div>
                                    <div class="sub-title">Profile Picture</div>
                                         <input type="file" id="profile" name="profilepicture" accept="image/*" value="
                                    <?php 
                                        if($userProfile->getNric()!='nil'){
                                           echo $userProfile->getProfileURL();
                                        }else
                                            echo "";
                                        ?>
                                         ">

                                            <p class="help-block">Upload your profile picture.<br/>
                                      <?php 
                                        if($userProfile->getNric()!='nil'){
                                           echo "Current picture: <br/> <img style=\"width:30%; length:30%;\" src='".$userProfile->getProfileURL()."' />";
                                        }
                                        ?>
                                            </p>
                            <div class="sub-title">Citizenship:<?php echo $userProfile->getCitizenship(); ?></div>
                                 <div>
                                 <div class="radio3">
                                          <input type="radio" id="radio1" name="citizenship" value="Singaporean"
                                    <?php 
                                        if($userProfile->getNric()!='nil' && $userProfile->getCitizenship()=='singaporean' ){
                                           echo "checked";
                                        }else
                                            echo "";
                                        ?>>
                                          <label for="radio1">
                                             Singaporean
                                          </label>
                                        </div>
                                        <div class="radio3">
                                          <input type="radio" id="radio2" name="citizenship" value="Non-Singaporean"
                                        
                                          <?php 
                                        if($userProfile->getNric()!='nil' && $userProfile->getCitizenship()=='non-singaporean' ){
                                           echo "checked";
                                        }else
                                            echo "";
                                        ?>>
                                          <label for="radio2">
                                            Non-Singaporean
                                          </label>
                                        </div>
                                 </div>
                                 <div class="sub-title">Contact Number:</div>
                                    <div>
                                        <input type="text" name="contactnumber" class="form-control" placeholder="Enter your contact number." value="<?php
                                        if($userProfile->getNric()!='nil'){
                                           echo $userProfile->getContactNumber();
                                        }else
                                            echo "";
                                        ?>"
                                        ">
                                    </div>

                                <div class="sub-title">Address:</div>
                                    <div>
                                        <textarea class="form-control" rows="3" name="address" placeholder="Enter your address" ><?php 
                                        if($userProfile->getNric()!='nil'){
                                           echo $userProfile->getAddress();
                                        }else
                                            echo "";
                                        ?></textarea>
                                    </div>
                                 <div class="sub-title">Postal Code:</div>
                                    <div>
                                        <input type="text" name="postalcode" class="form-control" placeholder="Enter your postal code." value="<?php 
                                        if($userProfile->getNric()!='nil'){
                                           echo $userProfile->getPostalCode();
                                        }else
                                            echo "";
                                        ?>">
                                    </div>
                                 <div class="sub-title">Occupation:</div>
                                    <div>
                                        <input type="text" name="occupation" class="form-control"  placeholder="Enter the name of your occupation." value="<?php 
                                        if($userProfile->getNric()!='nil'){
                                           echo $userProfile->getOccupation();
                                        }else
                                            echo "";
                                        ?>">
                                    </div>

                                <div class="sub-title">Current Income ($): </div>
                                    <div>
                                        <input type="text" name="income" class="form-control" placeholder="Enter your income." value="<?php 
                                        if($userProfile->getNric()!='nil'){
                                           echo $userProfile->getIncome();
                                        }else
                                            echo "";
                                        ?>">
                                    </div>
                                <div class="sub-title">Flat Eligibility: </div>
                                    <div>
                                        <input type="text" name="flageligibility" class="form-control" placeholder="Not Applicable" value="NA" readOnly="true" value="
                                       <?php 
                                       if($userProfile->getNric()!='nil'){
                                           echo $userProfile->getFlatEligibility();
                                        }else
                                            echo "";
                                        ?>
                                        ">
                                    </div>
                                 <div class="sub-title">Income Celling: </div>
                                    <div>
                                        <input type="text" name="flatEligibility" class="form-control"  placeholder="Not Applicable" value="NA" readOnly="true">
                                    </div>
                                    <div class="sub-title"></div>
                                    <div>
                                    <button type="submit" value="Submit" class="btn btn-default">Save Changes</button>
                                    </div>
                                </form>
                                </div>
                                <!--end of card body-->
                                </div>
                            </div>
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
