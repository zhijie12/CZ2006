<?php include("header.php") ?>
<style type="text/css">
    /*Add your own styles here.*/
</style>
<script type="text/javascript">
    //Add your own scripts here
</script>
</head>
<body class="flat-blue">
<?php include("menu.php") ?>
 <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title">- Something will be included soon -</span>
                        <div class="description">A ui elements use in form, input, select, etc.</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Form Elements</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    Examples of standard form controls. such as input, textarea, select, checkboxes and radios , static control, etc.
                                    <?php
                                        $incomingArr = $_SESSION["fromWhere"];  
                                        if($incomingArr[0]=='userProfile' && $incomingArr[1]=='s'){
                                            echo "
                                             <div class=\"isa_success\">
                                                 <i class=\"fa fa-check\"></i>
                                                 Your Profile has been saved successfully.
                                            </div>
                                                ";

                                        }else if($incomingArr[0]=='userProfile' && $incomingArr[1]=='f'){
                                            echo "<div class=\"isa_error\">
                                                   <i class=\"fa fa-times-circle\"></i>
                                                     Your Profile has not been saved successfully.
                                                </div>";
                                        }else if($incomingArr[0]=='familyProfile' && $incomingArr[1]=='s'){
                                            echo "
                                             <div class=\"isa_success\">
                                                 <i class=\"fa fa-check\"></i>
                                                 Your Family Profile has been saved successfully.
                                            </div>
                                                ";

                                        }else if($incomingArr[0]=='familyProfile' && $incomingArr[1]=='f'){
                                            echo "<div class=\"isa_error\">
                                                   <i class=\"fa fa-times-circle\"></i>
                                                     Your Family Profile has not been saved successfully.
                                                </div>";
                                        }
                                        $array=array('nil','nil');
                                        $_SESSION["fromWhere"] = $array;
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
<?php include("footer.php") ?>