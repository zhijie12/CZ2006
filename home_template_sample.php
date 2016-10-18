<?php
       include("entity/UserProfile.php");
        session_start();
        $userProfile = unserialize($_SESSION['userProfile']);
        if(!isset($_SESSION['userNRIC'])){
            header("Location: index.php"); //Redirect back
            exit();
        }
    ?>

<?php include("header.php") ?>
 <!-- Main Content -->
<div class="container-fluid">
	<div class="side-body">
		<div class="page-title">
			<span class="title">Dashboard</span>
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
							}
							$array=array('nil','nil');
							$_SESSION["fromWhere"] = $array;
							?>
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
	</div>
</div>

<?php include("footer.php") ?>