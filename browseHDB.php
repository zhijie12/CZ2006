<?php include("header.php") ?>
<style type="text/css">
    th:after{
        display:none !important;
    }
    .hideme{
        display:none !important;
    }
</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    //Add your own scripts here
    $( document ).ready(function() { //ON READY
        //console.log( "ready!" );
        $.ajax({
            url: "controllers/BrowseHDB/browseHDBController.php?action=load",
        }).done(function(result) {
            var options = JSON.parse(result);
            console.log(options);
            var $row;
            var $i;
            url = "controllers/BrowseHDB/browseHDBController.php?action=load";
            table = $("#browseHDB").DataTable({
                "ajax": url,
            });

            for (i=0; i< options.length; i++){
            //$("table[name='browseHDB']").append("<td>'"+options[i][i]+"'></td>");
        }
    });
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
                            <table id="browseHDB" class="display">
                                <thead>
                                    <tr>
                                        <th>Town</th>
                                        <th>Flat Type</th>
                                        <th>Address</th>
                                        <th>Storey</th>
                                        <th>Floor Area</th>
                                        <th>Flat Model</th>
                                        <th>Lease Commence Date</th>
                                        <th>Price</th>
                                        <th>Owner</th>
                                        <th>Upload Date</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Town</th>
                                        <th>Flat Type</th>
                                        <th>Address</th>
                                        <th>Storey</th>
                                        <th>Floor Area</th>
                                        <th>Flat Model</th>
                                        <th>Lease Commence Date</th>
                                        <th>Price</th>
                                        <th>Owner</th>
                                        <th>Upload Date</th>
                                        <th>Image</th>
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