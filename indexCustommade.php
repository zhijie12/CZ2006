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
                                <div class="icon"><img class="banner" style="width:30px;height:30px;" src="IMG/logo(S).png"></div>
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
                        <span class="title">Form UI Kits</span>
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
                                    <div class="sub-title">Input</div>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Text input">
                                    </div>
                                    <div class="sub-title">Textarea</div>
                                    <div>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="sub-title">Checkboxes and radios <span class="description">( with <a href="https://github.com/tui2tone/checkbox3">checkbox3</a> )</span></div>
                                    <div>
                                        <div class="checkbox3 checkbox-round">
                                          <input type="checkbox" id="checkbox-2">
                                          <label for="checkbox-2">
                                            Option one is this and that&mdash;be sure to include why it's great
                                          </label>
                                        </div>
                                        <div class="checkbox3 checkbox-round">
                                          <input type="checkbox" id="checkbox-3" disabled="">
                                          <label for="checkbox-3">
                                            Option two is disabled
                                          </label>
                                        </div>
                                        <div class="radio3">
                                          <input type="radio" id="radio1" name="radio1" value="option1">
                                          <label for="radio1">
                                            Option one is this and that&mdash;be sure to include why it's great
                                          </label>
                                        </div>
                                        <div class="radio3">
                                          <input type="radio" id="radio2" name="radio1" value="option2">
                                          <label for="radio2">
                                            Option two can be something else and selecting it will deselect option one
                                          </label>
                                        </div>
                                        <div class="sub-title">Inline</div>
                                        <div>
                                          <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                            <input type="checkbox" id="checkbox-fa-light-1" checked="">
                                            <label for="checkbox-fa-light-1">
                                              Option1
                                            </label>
                                          </div>
                                          <div class="checkbox3 checkbox-success checkbox-inline checkbox-check checkbox-round  checkbox-light">
                                            <input type="checkbox" id="checkbox-fa-light-2" checked="">
                                            <label for="checkbox-fa-light-2">
                                              Option Round
                                            </label>
                                          </div>
                                          <div class="checkbox3 checkbox-danger checkbox-inline checkbox-check  checkbox-circle checkbox-light">
                                            <input type="checkbox" id="checkbox-fa-light-3" checked="">
                                            <label for="checkbox-fa-light-3">
                                              Option Circle
                                            </label>
                                          </div>
                                        </div>
                                        <div>
                                          <div class="radio3 radio-check radio-inline">
                                            <input type="radio" id="radio4" name="radio2" value="option1" checked="">
                                            <label for="radio4">
                                              Option 1
                                            </label>
                                          </div>
                                          <div class="radio3 radio-check radio-success radio-inline">
                                            <input type="radio" id="radio5" name="radio2" value="option2">
                                            <label for="radio5">
                                              Option 2
                                            </label>
                                          </div>
                                          <div class="radio3 radio-check radio-warning radio-inline">
                                            <input type="radio" id="radio6" name="radio2" value="option3">
                                            <label for="radio6">
                                              Option 3
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="sub-title">Toggle <span class="description">( with <a href="https://github.com/nostalgiaz/bootstrap-switch">bootstrap-switch</a> )</span></div>
                                    <div>
                                        <input type="checkbox" class="toggle-checkbox" name="my-checkbox" checked>
                                    </div>
                                    <div class="sub-title">Select <span class="description">( with <a href="https://select2.github.io/">select2</a> )</span></div>
                                    <div>
                                        <select>
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                            </optgroup>
                                            <optgroup label="Mountain Time Zone">
                                                <option value="AZ">Arizona</option>
                                                <option value="CO">Colorado</option>
                                                <option value="ID">Idaho</option>
                                                <option value="MT">Montana</option>
                                                <option value="NE">Nebraska</option>
                                                <option value="NM">New Mexico</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="UT">Utah</option>
                                                <option value="WY">Wyoming</option>
                                            </optgroup>
                                            <optgroup label="Central Time Zone">
                                                <option value="AL">Alabama</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="IL">Illinois</option>
                                                <option value="IA">Iowa</option>
                                                <option value="KS">Kansas</option>
                                                <option value="KY">Kentucky</option>
                                                <option value="LA">Louisiana</option>
                                                <option value="MN">Minnesota</option>
                                                <option value="MS">Mississippi</option>
                                                <option value="MO">Missouri</option>
                                                <option value="OK">Oklahoma</option>
                                                <option value="SD">South Dakota</option>
                                                <option value="TX">Texas</option>
                                                <option value="TN">Tennessee</option>
                                                <option value="WI">Wisconsin</option>
                                            </optgroup>
                                            <optgroup label="Eastern Time Zone">
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="FL">Florida</option>
                                                <option value="GA">Georgia</option>
                                                <option value="IN">Indiana</option>
                                                <option value="ME">Maine</option>
                                                <option value="MD">Maryland</option>
                                                <option value="MA">Massachusetts</option>
                                                <option value="MI">Michigan</option>
                                                <option value="NH">New Hampshire</option>
                                                <option value="NJ">New Jersey</option>
                                                <option value="NY">New York</option>
                                                <option value="NC">North Carolina</option>
                                                <option value="OH">Ohio</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WV">West Virginia</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
