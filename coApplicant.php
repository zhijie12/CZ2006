<?php include("header.php") ?>
<style type="text/css">
    /*Add your own styles here.*/
</style>
<script type="text/javascript">
  var options;

  $(document).ready(function() {
    $.ajax({
      url: "controllers/ProfileManager/validateFamilyProfileController.php?action=getCurrentInfo",
    })
    .done(function(result) {
       familyInfo = JSON.parse(result);
       console.log(familyInfo);
      if(familyInfo.data[0].length>0){
        //populate the fields
        document.getElementsByName("fullname")[0].value= familyInfo.data[0][0];
        document.getElementsByName("nric")[0].value = familyInfo.data[0][1];
        document.getElementsByName("dateofbirth")[0].value=familyInfo.data[0][2];
        document.getElementsByName("contactnumber")[0].value=familyInfo.data[0][12];
        document.getElementsByName("address")[0].value=familyInfo.data[0][10];
        document.getElementsByName("postalcode")[0].value=familyInfo.data[0][11];
        document.getElementsByName("occupation")[0].value=familyInfo.data[0][9];
        document.getElementsByName("income")[0].value = familyInfo.data[0][5];
        document.getElementsByName("household")[0].value=familyInfo.data[0][3];
		$("#relationship").val(familyInfo.data[0][4]).trigger("change");
        if(familyInfo.data[0][7]=="Singaporean"){  
          document.getElementById("radio1").checked=true;
        }else{
          document.getElementById("radio2").checked=true;
        }
        if(familyInfo.data[0][6]=="yes"){
          document.getElementById("radio5").checked=true;
        }else{
          document.getElementById("radio6").checked=true;
        }
      }
    });
  });
  /*  var action = $("input[name='action']").val();
    url = "controllers/PastResaleFlat/PastTransController.php?"+"action="+action+"&town=&flatType=&month=";
    table = $("#resultTable").DataTable({
      "ajax": url,
    });
  });*/
    //Add your own scripts here
    function validateForm() {
            var outputMsg="";
            var vnric = document.getElementsByName("nric")[0].value;
            var vcontactnumber = document.getElementsByName("contactnumber")[0].value;
            var vfullname = document.getElementsByName("fullname")[0].value;
            var vaddress = document.getElementsByName("address")[0].value;
            var vdateofbirth = document.getElementsByName("dateofbirth")[0].value;
            var vpostalcode = document.getElementsByName("postalcode")[0].value;
            var vrelationship = document.getElementsByName("relationships")[0].value;
            var vincome = document.getElementsByName("income")[0].value;
            var vcitizenship = document.getElementsByName("citizenship")[0].value;
            var voccupation = document.getElementsByName("occupation")[0].value;
            var vhousehold = document.getElementsByName("household")[0].value;
            var hdbOwner = document.getElementsByName("hdbOwnership")[0].value;
            if (vnric == null || vnric == "") {
                outputMsg=outputMsg + "- NRIC of co-applicant field is empty<br />";
            }
            if (vfullname == null || vfullname== "") {
                outputMsg=outputMsg + "- Name of co-applicant  field is empty<br />";
            }
             if (vdateofbirth == null || vdateofbirth == "") {
                outputMsg=outputMsg + "- Date of birth of co-applicant field is empty <br />";
            }
            if (vrelationship == null || vrelationship == "") {
                outputMsg=outputMsg + "- Relationship of co-applicant with applicant field is empty <br />";
            }
            if (vcitizenship == null || vcitizenship == "") {
                outputMsg=outputMsg + "- citizenship of co-applicant field is not selected<br />";
            }
            if (vcontactnumber == null || vcontactnumber == "") {
                outputMsg=outputMsg + "- Contact number of co-applicant field is empty <br />";
            }
			if (isNaN(vcontactnumber) || vcontactnumber.length!=8){
				outputMsg=outputMsg + "- Enter 8 digits for Contact Number <br/>";
			}
			
            if (vaddress == null || vaddress == "") {
                outputMsg=outputMsg + "- Address of co-applicant field is empty <br />";
            }
            if (vpostalcode == null || vpostalcode == "") {
                outputMsg=outputMsg + "- Postal Code of co-applicant field is empty <br />";
            }
			if (isNaN(vpostalcode) || parseInt(vpostalcode)<0 || vpostalcode.length!=6){
				outputMsg=outputMsg + "- Enter only 6 digit for Postal Code <br/>";
			}
            if (voccupation == null || voccupation == "") {
                outputMsg=outputMsg + "- Occupation of co-applicant  field is empty<br />";
            }
            if (vincome == null || vincome == "") {
                outputMsg=outputMsg + "- Income of co-applicant field  is empty<br />";
            }
			if (isNaN(vincome) || parseInt(vincome)<0){
				outputMsg=outputMsg + "- Enter only positive numbers for income <br/>";
			}
            if (hdbOwner == null || hdbOwner == "") {
                outputMsg=outputMsg + "- HDB Ownership of co-applicant field is empty<br />";
            }
            if (vhousehold == null || vhousehold == "") {
                outputMsg=outputMsg + "- Current number of family members living in the same household field is empty<br />";
            }
			if (isNaN(vhousehold) || parseInt(vhousehold)<0){
				outputMsg=outputMsg + "- Enter only positive numbers for number of family members living in the same household <br/>";
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
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title"><span class="icon glyphicon glyphicon-home" style="padding-right: 15px;"></span>Please enter your co-applicant/family details:</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--This portion is to do validation check and out put details-->
                                        <div class="isa_error" name="isa_error" style="display:none;">
                                                <p name="error_para">
                                                    Your Profile has not been saved successfully.
                                                    </p>
                                                </div>
                                 <form onsubmit="return validateForm()"  action="controllers/ProfileManager/validateFamilyProfileController.php" method="POST" enctype="multipart/form-data" >
                                    <div class="sub-title">NRIC of Co-Applicant: 
                                    </div>
                                    <div>
                                 <input type="text" name="nric" class="form-control"  placeholder='Enter the NRIC of the co-applicant'>

                                    </div>

                                    <div class="sub-title">Full Name of Co-Applicant:</div>
                                    <div>
                                        <input type="text" class="form-control" name="fullname" class="form-control" placeholder="Enter your name." value=""
                                        >
                                    </div>
                                    <div class="sub-title">Relationship of Co-Applicant with Main Applicant: 
                                    </div>
                                    <div>
                                      <select name="relationships" id="relationship" style="width:200px" >
                                        <option value="0">Relationship</option>
                                        <option value="father">Father</option>
                                        <option value="mother">Mother</option>
                                        <option value="spouse">Spouse</option>
                                        <option value="son">Son</option>
                                        <option value="daughter">Daughter</option>
                                        <option value="sister">Sister</option>
                                        <option value="brother">Brother</option>
                                      </select>
                                    </div>
                                  

                                    <div class="sub-title">Date of Birth of Co-Applicant:</div>
                                    <div>
                                        <input type="date" name="dateofbirth" class="form-control"
                                         value=""
                                        >
                                    </div>

                            <div class="sub-title">Citizenship of Co-Applicant:</div>
                                 <div>
                                 <div class="radio3">
                                          <input type="radio" id="radio1" name="citizenship" value="Singaporean">
                        
                                          <label for="radio1">
                                             Singaporean
                                          </label>
                                        </div>
                                        <div class="radio3">
                                          <input type="radio" id="radio2" name="citizenship" value="Non-Singaporean" >
                                          <label for="radio2">
                                            Non-Singaporean
                                          </label>
                                        </div>
                                 </div>
                                 <div class="sub-title">Contact Number of Co-Applicant:</div>
                                    <div>
                                        <input type="text" name="contactnumber" class="form-control" placeholder="Enter your contact number." value="">
                                    </div>

                                <div class="sub-title">Address of Co-Applicant:</div>
                                    <div>
                                        <textarea class="form-control" rows="3" name="address" placeholder="Enter your address" ></textarea>
                                    </div>
                                 <div class="sub-title">Postal Code of Co-Applicant:</div>
                                    <div>
                                        <input type="text" name="postalcode" class="form-control" placeholder="Enter your postal code." value="">
                                    </div>
                                 <div class="sub-title">Occupation of Co-Applicant:</div>
                                    <div>
                                        <input type="text" name="occupation" class="form-control"  placeholder="Enter the name of your occupation." value="">
                                    </div>

                                <div class="sub-title">Current Income of Co-Applicant: ($): </div>
                                    <div>
                                        <input type="text" name="income" class="form-control" placeholder="Enter your income." value="">
                                    </div>
                                 <div class="sub-title">Current number of family members living in the same household:</div>
                                 <input type="text" name="household" class="form-control" placeholder="Enter number of family members living in the same household." value="">
                                    <div>
                                 <div class="sub-title">HDB Ownership of Co-Applicant:</div>
                                 <div class="radio3">
                             <input type="radio" id="radio5" name="hdbOwnership" value="yes"
                                    >
                                          <label for="radio5">
                                             Yes
                                          </label>
                                        </div>
                                        <div class="radio3">
                                          <input type="radio" id="radio6" name="hdbOwnership" value="no" >
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