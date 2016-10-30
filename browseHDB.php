<?php include("header.php") ?>
<style type="text/css">
    th:after{
        display:none !important;
    }
    .hideme{
        display:none !important;
    }
	#map {
        width: 100%;
        height: 400px;
		margin:auto;
		margin-bottom:25px;
    }
	.checkbox input[type='checkbox']{
		position: relative !important;
	}
	.checkbox{
		position: relative;
		margin-top: 10px !important;
		margin-bottom: 15px !important;
		display:block;
		margin-left: 5%;
	}    
</style>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_D5gb2uHoSAOnR_i9sWrQxjMUzKKK-Io&libraries=places,geometry&callback=initMap">
</script>
<script src="js/map.js"></script>
<script src="js/markerClusterer.js"></script>

<script type="text/javascript">
	//map
	function initMap(){
		var mapDiv = document.getElementById('map');
		map = new google.maps.Map(mapDiv, {
			center: {lat: 1.359599, lng: 103.812364},
			zoom: 12
		});
		$('#browseHDB tbody').on( 'click', 'tr', function () {
			if ( $(this).hasClass('selected') ) {
				$(this).removeClass('selected');
			}
			else {
				table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
			}
		});
		$("#browseHDB_wrapper .row .col-sm-7").prepend("<input type='button' onclick='findNearbyFacility()' class='btn btn-default' style='float: right;height: 32px;'value='Check Nearby Facilities'>");
		$(".mapFilter #changeRadius").on("click",function(){
			radius = parseInt($(".mapFilter input[name='radius']").val());
			alert(radius);
			removeplotsPerma();
			plotNearby(map,HDBLocation);
		});
		$(".mapFilter input[type='checkbox']").on("change",function(){
			var index = types.indexOf(this.name);
			if(this.checked==true){
				if(index==-1){
					types.push(this.name);
				}
			}else{
				if(index!=-1){
					types.splice(index, 1);
				}
			}
			removeplots();
			replot();
		});
	}
	
	function findNearbyFacility(){
		$('html,body').animate({
		   scrollTop: $("#map").offset().top
		});
		removeLocationPerma();
		removeplotsPerma();
		//var address = "BLOCK "+table.$('tr.selected')[0].cells[3].innerText+" "+table.$('tr.selected')[0].cells[2].innerText
		var address = table.$('tr.selected')[0].cells[1].innerText;
		var locations = [address];
		if(locations){
			for(i=0;i<locations.length;i++){
				noOfAjax++;
				convert(map,locations[i],function(results, status){
					noOfAjax--;
					checkControl();
					if (status == google.maps.GeocoderStatus.OK){
						for(j=0;j<results.length;j++){
							var marker; 
							marker = plot(map,results[j].geometry.location,null,results[j].formatted_address);
							HDBLocation.push(results[j]);
							HDBMarkers.push(marker);
						}
						plotNearby(map,results);
						
					}
				});
			}
		}else{
			alert("no location is found");
		}
	}
	//end of map


    //Add your own scripts here
    $( document ).ready(function() { //ON READY
        url = "controllers/BrowseHDB/browseHDBController.php?action=load";
        table = table = $("#browseHDB").DataTable({
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
							if(isset($_SESSION["makeOffer"])){
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
							}
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
							<div class="row" >
								<div class="sub-title" style="margin-left:25px;">Check Nearby Facilities </div>
								<div class="col-xs-12">
									<div class="col-xs-7">
										<div id="map"></div>
									</div>
									<div class="col-xs-4">
										<div class="mapFilter">
											<div class="sub-title">Facilities </div>
											<div class="checkbox">
												<input type="checkbox" name="gym" checked data-toggle="toggle">
												<label for="gym">Gym</label>
											</div>
											<div class="checkbox">
												<input type="checkbox" name="atm" checked data-toggle="toggle">
												<label for="ATM">ATM</label>
											</div>
											<div class="checkbox">
												<input type="checkbox" name="school" checked data-toggle="toggle">
												<label for="school">School</label>
											</div>
											<div class="checkbox">
												<input type="checkbox" name="shopping_mall" checked data-toggle="toggle">
												<label for="shopping_mall">Shopping Mall</label>
											</div>
											<div class="checkbox">
												<input type="checkbox" name="library" checked data-toggle="toggle">
												<label for="library">Library</label>
											</div>
											<div class="sub-title">Radius (m)</div>
											<div class="">
												<input type="number" value="500" class="form-control" name="radius">
												<input id="changeRadius" class="btn btn-default" value="change" type="button"/>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php") ?>