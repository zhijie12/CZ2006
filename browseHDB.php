<?php include("header.php") ?>
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
        //console.log( "ready!" );
        url = "controllers/BrowseHDB/browseHDBController.php?action=load";
        table = table = $("#browseHDB").DataTable({
                "ajax": url,
        });

        /*$.ajax({
            url: "controllers/BrowseHDB/browseHDBController.php?action=load",
        }).done(function(result) {
            var options = JSON.parse(result);
            console.log(options);
            url = "controllers/BrowseHDB/browseHDBController.php?action=load";
            table = $("#browseHDB").DataTable({
                "ajax": url,
            });

    });*/
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
                                <div class="title"> Browse HDB Resale Flats</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $incomingArr = $_SESSION["makeOffer"];  
                            if($incomingArr[0]=='makeOffer' && $incomingArr[1]=='s'){
                                echo "
                                <div class=\"isa_success\">
                                   <i class=\"fa fa-check\"></i>
                                   Your offer have been submitted successfully!
                               </div>";
                           }else if($incomingArr[0]=='makeOffer' && $incomingArr[1]=='u'){
                                echo "
                                <div class=\"isa_success\">
                                   <i class=\"fa fa-check\"></i>
                                   Your offer have been updated successfully!
                               </div>";
                           }else if($incomingArr[0]=='makeOffer' && $incomingArr[1]=='f'){
                                echo "
                                <div class=\"isa_error\">
                                   <i class=\"fa fa-check\"></i>
                                   Your offer have failed to submit! Please check your input! 
                               </div>";
                           }
                           $_SESSION["makeOffer"] = null;  //Clear it so it won't keep get stuck! 
                           ?>
                           <table id="browseHDB" class="display">
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
                                        <th>Offer</th>
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
                                        <th>Offer</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php") ?>