<?php include("header.php") ?>
<style type="text/css">
    /*Add your own styles here.*/

</style>
    <style type="text/css">
    th:after{
        display:none !important;
    }
    .hideme{
        display:none !important;
    }
    </style>
<script type="text/javascript">
    //Add your own scripts here
    $( document ).ready(function() { //ON READY
        console.log( "ready!" );
        url = "controllers/ConcludeDeal/getProposed2Me.php?action=proposed2me";
        table = table = $("#proposed2me").DataTable({
                "ajax": url,
        });
        console.log(url);
         url = "controllers/ConcludeDeal/getiProposed.php?action=proposed2me";
        table = table = $("#iproposed").DataTable({
                "ajax": url,
        });
    });
</script>
</head>

<body class="flat-blue">
<?php include("menu.php") ?>
 <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title">View Proposed Deals</span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Overview the deals that other buyers are interested in (Buyer Details):</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                     <?php
                            $incomingArr = $_SESSION["concludeOffer"];  
                            if($incomingArr[0]=='concludeOffer' && $incomingArr[1]=='s'){
                                echo "
                                <div class=\"isa_success\">
                                   <i class=\"fa fa-check\"></i>
                                   Your offer details have been saved successfully!
                               </div>";
                           }else  if($incomingArr[0]=='concludeOffer' && $incomingArr[1]=='f'){
                                echo "
                                <div class=\"isa_error\">
                                   <i class=\"fa fa-check\"></i>
                                   Your offer have failed to save! Please try again! 
                               </div>";
                           }
                           $_SESSION["concludeOffer"] = null;
                           ?>  
                                <table id="proposed2me" class="display" style="text-align:center;">
                                <thead>
                                    <tr>    
                                        <th>Buyer:</th>
                                        <th>Contact(Phone)</th>  
                                        <th>Contact(Email)</th>                           
                                        <th>Citizenship</th>
                                        <th>Co-Applicant</th>                  
                                        <th>Offer Price</th>
                                        <th>Date Proposed</th> 
                                        <th>Status</th>                    
                                        <th>Accept</th>
                                        <th>Decline</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>                                        
                                        <th>Buyer Name:</th>
                                        <th>Contact(Phone):</th>  
                                        <th>Contact(Email):</th>                           
                                        <th>Citizenship:</th>
                                        <th>Co-Applicant:</th>                  
                                        <th>Offer Price:</th>
                                        <th>Date Proposed:</th>                     
                                        <th>Accept</th>
                                        <th>Decline</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                                </div>

                            </div>
                        </div>
                                            <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Overview the deals that you are interested in:</div>
                                                                   <table id="iproposed" class="display" class="display" style="text-align:center;">
                                <thead>
                                    <tr>
                                        <th>Image</th>     
                                        <th>Address</th>
                                        <th>Flat Type</th>                           
                                        <th>Storey</th>
                                        <th>Floor Area</th>                            
                                        <th>Lease Commence Date</th>
                                        <th>Price</th>
                                        <th>Owner</th>                          
                                        <th>HDB Description</th>
                                        <th>Price you offered</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>                                        
                                        <th>Image</th>     
                                        <th>Address</th>
                                        <th>Flat Type</th>                           
                                        <th>Storey</th>
                                        <th>Floor Area</th>                            
                                        <th>Lease Commence Date</th>
                                        <th>Price</th>
                                        <th>Owner</th>                          
                                        <th>HDB Description</th>
                                        <th>Price you offered</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                                    </div>
                                </div>
                                <div class="card-body">
                        </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
<?php include("footer.php") ?>