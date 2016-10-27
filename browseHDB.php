<?php include("header.php") ?>
<style type="text/css">
    /*Add your own styles here.*/
</style>
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

        for (i=0; i< options.length; i++){

            $("table[name='browseHDB']").append("<td>'"+options[i][i]+"'></td>");
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
                            Hello World
                            <table name="browseHDB">
                            <tr> 
                                <td> </td> 
                            </tr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php") ?>