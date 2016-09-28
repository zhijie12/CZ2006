<!DOCTYPE html>
<html>

<head>
    <title>Harmonious Living @ NTU</title>
    <link rel="shortcut icon" type="image/x-icon" href="icons/logo(S).png" />
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
       <link rel="stylesheet" type="text/css" href="css/style.css">
       <link rel="stylesheet" type="text/css" href="css/flat-blue.css">
   </head>

   <body class="flat-blue">
    <div class="app-container">
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand-toggle">
                            <i class="fa fa-bars icon"></i>
                        </button>
                        <ol class="breadcrumb navbar-breadcrumb">
                            <li class="active">Home</li>
                        </ol>
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-th icon"></i>
                        </button>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-times icon"></i>
                        </button>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-envelope"></i></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="title">
                                    Notification <span class="badge pull-right">0</span>
                                </li>
                                <li class="message">
                                    No new notification
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Emily Hart <span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="profile-img">
                                    <img src="../img/profile/picjumbo.com_HNCK4153_resize.jpg" class="profile-img">
                                </li>
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username">Emily Hart</h4>
                                        <p>emily_hart@email.com</p>
                                        <div class="btn-group margin-bottom-2x" role="group">
                                            <button type="button" class="btn btn-default"><i class="fa fa-user"></i> Profile</button>
                                            <button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header" style="">
                            <a class="navbar-brand" href="#" style="background-color:#5EB9FF;">
                                <div class="icon"><img class="banner" style="width:30px;height:30px;" src="icons/logo(S).png"></div>
                                <div class="title">Harmonious Living @ NTU</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="index.html">
                                    <span class="icon glyphicon glyphicon-home"></span><span class="title">Home</span>
                                </a>
                            </li>
                            <!--HarmoniousDB tabs-->
                            <!-- View Profile  -->
                            <li>
                                <a href="http://www.youtube.com">
                                    <span class="icon glyphicon glyphicon-user"></span><span class="title">Manage My Profile</span>
                                </a>
                            </li>
                            <!--End of dropdown-->  
                            <!-- ViewCurrent  -->
                            <li>
                                <a href="http://www.google.com">
                                    <span class="icon glyphicon glyphicon-search"></span><span class="title">Browse Resale HDB</span>
                                </a>
                            </li>
                            <!--End of dropdown-->
                            <!-- View Past Listings  -->
                            <li>
                                <a href="http://facebook.com">
                                    <span class="icon glyphicon glyphicon-stats"></span><span class="title">Browse Past Trends</span>
                                </a>
                                <!-- Dropdown level 1 -->
                            </li>
                            <!--End of dropdown-->      
                            <!-- View Past Listings  -->
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-element">
                                    <span class="icon glyphicon glyphicon-list-alt"></span><span class="title">View My Listings</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-element" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href=""><span class= "icon glyphicon glyphicon-circle-arrow-up"></span>Upload My HDB</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!--End of dropdown-->        
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title">Manage/Upload HDB Flats</span>
                        <div class="description"> Upload/Manage your HDB Flats</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">HDB FLAT DETAILS</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="">
                                    <div class="sub-title">Address </div>
                                    <div>
                                        <input type="text" class="form-control" name="address" placeholder="e.g. Woodlands Drive 52" required>
                                    </div>


                                    <div class="sub-title">Town</div>
                                    <div>
                                        <input type="text" class="form-control" name="town" placeholder="e.g. Woodlands" required>
                                    </div>

                                    <div class="sub-title"> Floor Area (sqft) </div>
                                    <div>
                                        <input type="text" class="form-control" name="floorarea" placeholder="e.g. 1500" required>
                                    </div>

                                    <div class="sub-title"> Storey </div>
                                    <div>
                                        <input type="text" class="form-control" name="storey" placeholder="7" required>
                                    </div>

                                    <div class="sub-title"> Lease Commence Date: </div>
                                    <div>
                                        <input type="date" class="form-control" name="leaseCommence" placeholder="" required>
                                    </div>

                                    <div class="sub-title"> Asking Price:  </div>
                                    <div>
                                        <input type="text" class="form-control" name="askingPrice" placeholder="10000000" required>
                                    </div>


                                    <div class="sub-title"> Flat Model: </div>
                                    <div>
                                        <select name="flatType" required> 
                                            <option> 2 Room </option>
                                            <option> 3 Room </option>
                                            <option> 4 Room </option>
                                            <option> 5 Room </option>
                                            <option> Executive </option>
                                        </select>   
                                    </div>

                                    <div class="sub-title"> Flat Type: </div>
                                    <div>
                                        <select name="flatModel" required> 
                                            <option> Adjoined Flat </option>    
                                            <option> Apartment </option>
                                            <option> Improved </option>
                                            <option> Improved Maisonette </option>
                                            <option> Maisonette </option>
                                            <option> Model A </option>
                                            <option> Model A-Maisonette </option>
                                            <option> Model A2 </option>
                                            <option> Multi-Generation </option>
                                            <option> New Generation</option>
                                            <option> Premium Apartment</option>
                                            <option> Premium Maisonette</option>
                                            <option> Standard </option>
                                            <option> Terrace </option>
                                        </select>   
                                    </div>

                                    <div class="sub-title"> HDB Description </div>
                                    <div>
                                        <textarea class="form-control" name="hdbDescription" placeholder="e.g. 3 Toilet, includes aircon"   > </textarea> 
                                    </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    


                    <!-- New card -->
                    <!--
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Basic example</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" id="exampleInputFile">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="checkbox">
                                          <div class="checkbox3 checkbox-round">
                                            <input type="checkbox" id="checkbox-1">
                                            <label for="checkbox-1">
                                              Check me out
                                            </label>
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Inline form</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Name</label>
                                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                                        </div>
                                        <button type="submit" class="btn btn-default">Send invitation</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Horizontal form</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                              <div class="checkbox3 checkbox-round checkbox-check checkbox-light">
                                                <input type="checkbox" id="checkbox-10">
                                                <label for="checkbox-10">
                                                  Remember me
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    -->
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
