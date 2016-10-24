<?php include("header.php") ?>
<style type="text/css">
    /*Add your own styles here.*/
</style>
<script type="text/javascript">
    //Add your own scripts here
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
            var voccupation = document.getElementsByName("occupation")[0].value;
            var vprofilepicture = document.getElementsByName("profilepicture")[0].value;
            var vmop = document.getElementsByName("mop")[0].value;
            var vhdbOwner = document.getElementsByName("hdbOwnership")[0].value;
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
            if (voccupation == null || voccupation == "") {
                outputMsg=outputMsg + "- occupation field is empty<br />";
            }
            if (vincome == null || vincome == "") {
                outputMsg=outputMsg + "- Income field is empty<br />";
            }
            if (vmop == null || vmop == "") {
                outputMsg=outputMsg + "- Current Home Occupation Duration field is empty<br />";
            }
            if (vhdbOwner == null || vhdbOwner == "") {
                outputMsg=outputMsg + "- hdbOwnership field is not selected<br />";
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
<?php include("menu.php") ?>
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
                                 <div class="sub-title">Current Home Occupation Duration (Current House) :</div>
                                 <input type="text" name="mop" class="form-control" placeholder="Enter your current occupation period." value="<?php 
                                        if($userProfile->getNric()!='nil'){
                                           echo $userProfile->getMOPStatus();
                                        }else
                                            echo "";
                                        ?>">
                                    <div>
                                 <div class="sub-title">HDB Ownership:</div>
                                 <div class="radio3">
                             <input type="radio" id="radio5" name="hdbOwnership" value="yes"
                                    <?php 
                                        if($userProfile->getNric()!='nil' && $userProfile->gethdbOwnership()=='yes' ){
                                           echo "checked";
                                        }else
                                            echo "";
                                        ?>>
                                          <label for="radio5">
                                             Yes
                                          </label>
                                        </div>
                                        <div class="radio3">
                                          <input type="radio" id="radio6" name="hdbOwnership" value="no"
                                          <?php 
                                        if($userProfile->getNric()!='nil' && $userProfile->gethdbOwnership()=='no' ){
                                           echo "checked";
                                        }else
                                            echo "";
                                        ?>>
                                          <label for="radio6">
                                            No
                                          </label>
                                    <div>

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
<?php include("footer.php") ?>