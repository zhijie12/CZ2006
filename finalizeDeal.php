<?php
    session_start();
    $resaleID=$_GET['resaleID'];
    $buyerNRIC=$_GET['buyerNRIC'];
    $sellerNRIC=$_GET['sellerNRIC'];
    $curr_user=$_SESSION['userNRIC'];
    if(($curr_user==$buyerNRIC || $curr_user==$sellerNRIC)){
    }else
    {
        header("Location: index.php"); //Redirect back
        exit();
    }
?>
<?php include("header.php") ?>

<style>
table, td, th {
    border: 1px solid #ddd;
    text-align: left;

}

table {
    border-collapse: collapse;
    width: 70%;
    margin:auto;
}

th, td {
    padding: 15px;
        width:50%;
}
</style>
<script type="text/javascript">
    //Add your own scripts here
    var href=window.location.href;
    
    url="controllers/ConcludeDeal/"+href.substr(href.lastIndexOf('/') + 1);
      $(document).ready(function() {
    $.ajax({
      url: url,
    })
    .done(function(result) {
        console.log(result);
        var info = JSON.parse(result);
        //flat information
        $("table[name='flatInfo']").append("<tr><td>Address:</td><td>"+info[0][1]+"</td></tr>");
        $("table[name='flatInfo']").append("<tr><td>Flat Type:</td><td>"+info[0][2]+"</td></tr>");
        $("table[name='flatInfo']").append("<tr><td>Storey:</td><td>"+info[0][3]+"</td></tr>");
        $("table[name='flatInfo']").append("<tr><td>Floor Area:</td><td>"+info[0][4]+"</td></tr>");
        $("table[name='flatInfo']").append("<tr><td>Lease Commence Date:</td><td>"+info[0][5]+"</td></tr>");
        $("table[name='flatInfo']").append("<tr><td>Price Set by Owner:</td><td>"+info[0][6]+"</td></tr>");
        $("table[name='flatInfo']").append("<tr><td>HDB Description:</td><td>"+info[0][7]+"</td></tr>");
        $("table[name='flatInfo']").append("<tr><td>Image:</td><td>"+info[0][0]+"</td></tr>");

        $("table[name='flatInfo']").append("<tr><td>Price Offered by Buyer:</td><td>"+info[2][10]+"</td></tr>");

        $("table[name='flatInfo']").append("<tr><td>Date price offered:</td><td>"+info[2][11]+"</td></tr>");
        //flat owner information
        $("table[name='ownerInfo']").append("<tr><td>NRIC:</td><td>"+info[1][0]+"</td></tr>");
        $("table[name='ownerInfo']").append("<tr><td>Name:</td><td>"+info[1][1]+"</td></tr>");
        $("table[name='ownerInfo']").append("<tr><td>Date Of Birth:</td><td>"+info[1][4]+"</td></tr>");
        $("table[name='ownerInfo']").append("<tr><td>Address</td><td>"+info[1][2]+"</td></tr>");
        $("table[name='ownerInfo']").append("<tr><td>Postal Code:</td><td>"+info[1][3]+"</td></tr>");
        $("table[name='ownerInfo']").append("<tr><td>Contact Number:</td><td>"+info[1][9]+"</td></tr>");
        $("table[name='ownerInfo']").append("<tr><td>Citizenship:</td><td>"+info[1][5]+"</td></tr>");
        $("table[name='ownerInfo']").append("<tr><td>MOP Status:</td><td>"+info[1][6]+"</td></tr>");
        $("table[name='ownerInfo']").append("<tr><td>HDB Ownership:</td><td>"+info[1][7]+"</td></tr>");
        $("table[name='ownerInfo']").append("<tr><td>Profile Image:</td><td>"+info[1][8]+"</td></tr>");

        //buyer information
        $("table[name='mApplicant']").append("<tr><td>NRIC:</td><td>"+info[2][0]+"</td></tr>");
        $("table[name='mApplicant']").append("<tr><td>Name:</td><td>"+info[2][1]+"</td></tr>");
        $("table[name='mApplicant']").append("<tr><td>Date Of Birth:</td><td>"+info[2][4]+"</td></tr>");
        $("table[name='mApplicant']").append("<tr><td>Address</td><td>"+info[2][2]+"</td></tr>");
        $("table[name='mApplicant']").append("<tr><td>Postal Code:</td><td>"+info[2][3]+"</td></tr>");
        $("table[name='mApplicant']").append("<tr><td>Contact Number:</td><td>"+info[2][9]+"</td></tr>");
        $("table[name='mApplicant']").append("<tr><td>Citizenship:</td><td>"+info[2][5]+"</td></tr>");
        $("table[name='mApplicant']").append("<tr><td>MOP Status:</td><td>"+info[2][6]+"</td></tr>");
        $("table[name='mApplicant']").append("<tr><td>HDB Ownership:</td><td>"+info[2][7]+"</td></tr>");
        $("table[name='mApplicant']").append("<tr><td>Profile Image:</td><td>"+info[2][8]+"</td></tr>");

        if(info[3][0]!='NULL'){
            $("table[name='cApplicant']").append("<tr><td>NRIC:</td><td>"+info[3][0]+"</td></tr>");
             $("table[name='ownerInfo']").append("<tr><td>Name:</td><td>"+info[3][1]+"</td></tr>");
            $("table[name='cApplicant']").append("<tr><td>Date Of Birth</td><td>"+info[3][5]+"</td></tr>");
            $("table[name='cApplicant']").append("<tr><td>Contact Number:</td><td>"+info[3][2]+"</td></tr>");
            $("table[name='cApplicant']").append("<tr><td>Relationship with applicant:</td><td>"+info[3][3]+"</td></tr>");
            $("table[name='cApplicant']").append("<tr><td>Current Household Number:</td><td>"+info[3][4]+"</td></tr>");
            $("table[name='cApplicant']").append("<tr><td>Citizenship:</td><td>"+info[3][6]+"</td></tr>");
            $("table[name='cApplicant']").append("<tr><td>HDB Ownership:</td><td>"+info[3][7]+"</td></tr>");
        }else{
            $("table[name='cApplicant']").append("<tr><td><h4>Applicant applied himself/herself.</h5></td></tr>");
        }
      
        if(info[4][0]=="true" && info[4][1]=="buyer"){
              $("div[name='conBody").append("<div class='sub-title'>Please check if all the information is correct</br>Buyer Final Acknowledgement:</div>");
                    $("div[name='smallerBod").append("<form  style='float:left; 'action='"+url+"' method='post'><input type='hidden' name='submitType' value='Accept'><button type='submit' value='Accept' class='btn btn-default'>Accept</button></form>");

                    $("div[name='smallerBod").append("<form style='margin-left:30%;float:right;' action='"+url+"' method='post'><input type='hidden' name='submitType' value='Reject'><button type='submit' value='Accept' class='btn btn-default'>Reject</button></form>");
        }else if(info[4][0]=="true" && info[4][1]=="seller"){
         $("div[name='conBody").append("<div class='sub-title'>Please check if all the information is correct</br>Pending Buyer Final Acknowledgement</div>");
        }else{
         $("div[name='conBody").append("<div class='sub-title'>To Download the forms, click below</br></div>");
         $("div[name='smallerBod").append("<a href='PDF/HDB.pdf' target='_blank'><h4 style='font-dectoration:'underline;'>HDB Forms</h4></a>");

         $("div[name='smallerBod").append("<a href='PDF/agent.pdf' target='_blank'><h4 style='font-dectoration:'underline;'>Agent Forms</h4></a>");
        }

      })
  });
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
                                        <div class="title">Resale Flat Information:</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <table name="flatInfo" id="resultTable" class="display">
                                </table>
                        </div>
                                </div>
                            </div>

                                                    <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Owner's Details:</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <table name="ownerInfo" id="resultTable" class="display">
                                </table>
                        </div>
                                </div>
                            </div>

                                                    <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Main Applicant Details:</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <table name="mApplicant">
                                </table>
                        </div>
                                </div>
                            </div>

                                                    <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Co-Applicant Details</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <table name="cApplicant" id="resultTable" class="display">
                                </table>
                        </div>
                                </div>
                            </div>

                                                    <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Conclusion</div>

                                    </div>
                                </div>
                                <div class="card-body"  name="conBody" >

                        </div>

                                <div name="smallerBod" align="center" style="margin-left:20%;width:50%;">

                                </div>
                                    <br/>
                                  <br/>
                                    <br/>
                                      <br/>
                                        <br/>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
<?php include("footer.php") ?>