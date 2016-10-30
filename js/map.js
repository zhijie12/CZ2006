	var Icon_path="img/nearbyImg/";
	var cluster_icon_path='img/clusterImg/m';
	var types = ["gym","atm","school","shopping_mall","library"];
	var all_types=["gym","atm","school","shopping_mall","library"];
	var API_key = "AIzaSyD_D5gb2uHoSAOnR_i9sWrQxjMUzKKK-Io";
	var map;
	var radius = 500;

	var prevInfoWindow;
	var HDBMarkers = [];
	var HDBLocation = [];
	var NearbyMarkers = [];
	var NearbyClusterMarker = [];
	var circlesOverlays = [];
	var noOfAjax = 0;
	
		//replot using the existing markers
		function replot(){
			var arr = [];
			for(i=0;i<types.length;i++){
				arr.push([]);
			}

			for(i=0;i<NearbyMarkers.length;i++){
				for(j=0;j<types.length;j++){
					if(NearbyMarkers[i].icon==Icon_path+types[j]+".png"){
						NearbyMarkers[i].setMap(map);
						arr[j].push(NearbyMarkers[i]);
						break;
					}
				}
			}
			for(i=0;i<arr.length;i++){
				var mcOptions = {gridSize: 30, maxZoom: 15, imagePath: cluster_icon_path};
				var mc = new MarkerClusterer(map, arr[i], mcOptions);
				NearbyClusterMarker.push(mc);
			}
											
		}
		//1st time plotting, get nearby facilities thru google map API
		//OR change radius
		function plotNearby(map,results){
			//if(HDBLocation.length==1){
				map.setCenter(results[0].geometry.location);
				map.setZoom(16);
			//}
			for(k=0;k<results.length;k++){
				circlesOverlays.push(plotCircle(results[k].geometry.location,radius));
				for(i=0;i<all_types.length;i++){
					noOfAjax++
					findnearby(map,results[k].geometry.location,all_types[i],radius,function(result,status){
						noOfAjax--;
						checkControl();
						if (status == google.maps.places.PlacesServiceStatus.OK){	
							var type = "";
							if(result.length>0){
								for(i=0;i<all_types.length;i++){
									if(result[0].types.indexOf(all_types[i])>-1){
										type = all_types[i];
										break;
									}
								}
								var jsonArr = [];
								if(result.length>0){
									jsonArr.push({location: result[0].geometry.location,marks:[result[0]]});
									var prevLoc = result[0].geometry.location;
								}		
								for(j=1;j<result.length;j++){
									//check if the 2 points are close to each other
									if(google.maps.geometry.spherical.computeDistanceBetween(result[j].geometry.location,prevLoc)>5){
										var json = {location: result[j].geometry.location,marks:[result[j]]};
										jsonArr.push(json);
									}else{
										jsonArr[jsonArr.length-1].marks.push(result[j]);
									}
									prevLoc = result[j].geometry.location;
								}
								var icon = Icon_path+type+".png"
								var MarkerArr = [];
											
								for(j=0;j<jsonArr.length;j++){
									var location = jsonArr[j].marks[0].geometry.location; 
									var content = "";
									for(i=0;i<jsonArr[j].marks.length;i++){
										if(jsonArr[j].marks.length-1==i){
											//last element
											content+=jsonArr[j].marks[i].name+"<br>";
										}else{
											content+=jsonArr[j].marks[i].name+",<br>";
										}
									}
									var marker;
									if(types.indexOf(type)>-1){
										marker = plot(map,location,icon,content);
										MarkerArr.push(marker);
									}else{
										marker = createMarker(location,icon,content);
									}
									NearbyMarkers.push(marker);
								}
								var mcOptions = {gridSize: 30, maxZoom: 15, imagePath: cluster_icon_path};
								var mc = new MarkerClusterer(map, MarkerArr, mcOptions);
								NearbyClusterMarker.push(mc);
							}
						}
					});
				}
			}
		}
		
		
		
		//dun nid to change
		function findnearby(map,latlng,type,radius,callback){
			//var url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=AIzaSyD_D5gb2uHoSAOnR_i9sWrQxjMUzKKK-Io&radius=2000&location=1.348680,103.853020&type=gym";
			var request = {
				location: latlng,
				radius: radius,
				type: type
			};
			service = new google.maps.places.PlacesService(map);
			service.nearbySearch(request, callback);
		}
		function plotCircle(center,radius){
			var Circle = new google.maps.Circle({
				strokeColor: '#070778',
				strokeOpacity: 0.3,
				strokeWeight: 2,
				fillColor: '#9191F9',
				fillOpacity: 0.35,
				map: map,
				center: center,
				radius: radius
			});
			return Circle;
		}
		//remove clusters from the map and delete clusters
		//remove the markers from the map (for replotting purposes)
		function removeplots(){
			while(NearbyClusterMarker.length>0){
				NearbyClusterMarker[NearbyClusterMarker.length-1].clearMarkers();
				NearbyClusterMarker.pop();
			}
			for(i=0;i<NearbyMarkers.length;i++){
				NearbyMarkers[i].setMap(null);
			}
		}
		function removeplotsPerma(){
			while(NearbyClusterMarker.length>0){
				NearbyClusterMarker[NearbyClusterMarker.length-1].clearMarkers();
				NearbyClusterMarker.pop();
			}
			while(circlesOverlays.length>0){
				circlesOverlays[circlesOverlays.length-1].setMap(null);
				circlesOverlays.pop();
			}
			while(NearbyMarkers.length>0){
				NearbyMarkers[NearbyMarkers.length-1].setMap(null);
				NearbyMarkers.pop();
			}
		}
		function removeLocationPerma(){
			console.log(HDBMarkers);
			while(HDBMarkers.length>0){
				HDBMarkers[HDBMarkers.length-1].setMap(null);
				HDBMarkers.pop();
				HDBLocation.pop();
			}
		}
		//how to plot
		function plot(map,location,icon,content){
			var marker;
			if(icon==null){
				marker = new google.maps.Marker({
					position: location,
					map: map
				});
			}else{
				marker = new google.maps.Marker({
					position: location,
					map: map,
					icon: icon
				});
			}
			var infowindow = new google.maps.InfoWindow({
                    content: content,
            });
			marker.infowindow = infowindow;
			google.maps.event.addListener(marker, 'click', function() {
				if(prevInfoWindow!=null){
					prevInfoWindow.close();
				}
				prevInfoWindow = infowindow
                infowindow.open(map,marker);
            });
			return marker;
		}
		
		function createMarker(location,icon,content){
			var marker;
			if(icon==null){
				marker = new google.maps.Marker({
					position: location,
					map: null
				});
			}else{
				marker = new google.maps.Marker({
					position: location,
					map: null,
					icon: icon
				});
			}
			var infowindow = new google.maps.InfoWindow({
                    content: content,
            });
			marker.infowindow = infowindow;
			google.maps.event.addListener(marker, 'click', function() {
				if(prevInfoWindow!=null){
					prevInfoWindow.close();
				}
				prevInfoWindow = infowindow
                infowindow.open(map,marker);
            });
			return marker;
		}
		//how to convert address to latlng
		//callback is the function to handle when the latlng is received
		function convert(map,address,callback){
			var geocoder = new google.maps.Geocoder();
			geocoder.geocode( { 'address': address }, callback);
		}
		
		function checkControl(){
			if(noOfAjax==0){
				$(".mapFilter input").each(function(){
					this.disabled = false;
				})
			}else{
				$(".mapFilter input").each(function(){
					this.disabled = true;
				})
			}
		}
		/*
			
			//A LatLngBounds should be SW corner first, NE corner second:
			var strictBounds = new google.maps.LatLngBounds(
                    new google.maps.LatLng(60.88770, -0.83496), 
                    new google.maps.LatLng(49.90878, -7.69042)
            );

            // Listen for the dragend event
            google.maps.event.addListener(mymap, 'bounds_changed', function() {
                if (strictBounds.contains(mymap.getCenter())) return;

                // We're out of bounds - Move the map back within the bounds
                var c = mymap.getCenter(),
                x = c.lng(),
                y = c.lat(),
                maxX = strictBounds.getNorthEast().lng(),
                maxY = strictBounds.getNorthEast().lat(),
                minX = strictBounds.getSouthWest().lng(),
                minY = strictBounds.getSouthWest().lat();

                if (x < minX) x = minX;
                if (x > maxX) x = maxX;
                if (y < minY) y = minY;
                if (y > maxY) y = maxY;

                mymap.setCenter(new google.maps.LatLng(y, x));
            });
			*/