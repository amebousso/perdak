//function load() {

    if (GBrowserIsCompatible()) {
    
    
    	/*if (!navigator.geolocation){
		    output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
		    return;
		  }
		 
		  function success(position) {
		    var latitude  = position.coords.latitude;
		    var longitude = position.coords.longitude;
		 
		    output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';
		 
		    var img = new Image();
		    img.src = "http://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";
		 
		    output.appendChild(img);
		  };
		 
		  function error() {
		    output.innerHTML = "Unable to retrieve your location";
		  };
		 
		  output.innerHTML = "<p>Locating…</p>";
		 
		  navigator.geolocation.getCurrentPosition(success, error);*/
        if (document.getElementById("endroit_longitude").value != "") {
            var end_long = document.getElementById("endroit_longitude").value;
            var end_lat = document.getElementById("endroit_latitude").value;
        }else{
            var end_long = -17.453657 ;
            var end_lat = 14.719542 ;
        };

        var map = new GMap2(document.getElementById("map"));

        map.addControl(new GSmallMapControl());

        map.addControl(new GMapTypeControl());

        var center = new GLatLng(end_lat, end_long);

        map.setCenter(center, 12);

        geocoder = new GClientGeocoder();

        var marker = new GMarker(center, {draggable: true});

        map.addOverlay(marker);

        //document.getElementById("lat").innerHTML = center.lat().toFixed(7);

        document.getElementById("endroit_longitude").value = center.lng().toFixed(7);
        document.getElementById("endroit_latitude").value = center.lat().toFixed(7);

        //document.getElementById("lng").innerHTML = center.lng().toFixed(7);

        GEvent.addListener(marker, "dragend", function() {

            var point = marker.getPoint();

            map.panTo(point);

            document.getElementById("lat").innerHTML = point.lat().toFixed(7);

            document.getElementById("endroit_longitude").value = point.lng().toFixed(7);
            document.getElementById("endroit_latitude").value = point.lat().toFixed(7);

            document.getElementById("lng").innerHTML = point.lng().toFixed(7);

        });

        GEvent.addListener(map, "moveend", function() {

            map.clearOverlays();

            var center = map.getCenter();

            var marker = new GMarker(center, {draggable: true});

            map.addOverlay(marker);

            //document.getElementById("lat").innerHTML = center.lat().toFixed(7);

            document.getElementById("endroit_longitude").value = center.lng().toFixed(7);
            document.getElementById("endroit_latitude").value = center.lat().toFixed(7);

            //document.getElementById("lng").innerHTML = center.lng().toFixed(7);

            GEvent.addListener(marker, "dragend", function() {

                var point =marker.getPoint();

                map.panTo(point);

                //document.getElementById("lat").innerHTML = point.lat().toFixed(7);

                document.getElementById("endroit_longitude").value = point.lng().toFixed(7);
                document.getElementById("endroit_latitude").value = point.lat().toFixed(7);

                //document.getElementById("lng").innerHTML = point.lng().toFixed(7);

            });
        });
    }

//}

function showAddress(address) {

    var map = new GMap2(document.getElementById("map"));

    map.addControl(new GSmallMapControl());

    map.addControl(new GMapTypeControl());

    if (geocoder) {

        geocoder.getLatLng(

            address,

            function(point) {

                if (!point) {

                    alert(address + " not found");

                } else {

                    //document.getElementById("lat").innerHTML = point.lat().toFixed(7);

                    document.getElementById("endroit_longitude").value = point.lng().toFixed(7);
                    document.getElementById("endroit_latitude").value = point.lat().toFixed(7);

                    //document.getElementById("lng").innerHTML = point.lng().toFixed(7);

                    map.clearOverlays()

                    map.setCenter(point, 14);

                    var marker = new GMarker(point, {draggable: true});

                    map.addOverlay(marker);



                    GEvent.addListener(marker, "dragend", function() {

                        var pt = marker.getPoint();

                        map.panTo(pt);

                        //document.getElementById("lat").innerHTML = pt.lat().toFixed(7);

                        document.getElementById("endroit_longitude").value = pt.lng().toFixed(7);
                        document.getElementById("endroit_latitude").value = pt.lat().toFixed(7);

                        //document.getElementById("lng").innerHTML = pt.lng().toFixed(7);

                    });

                    GEvent.addListener(map, "moveend", function() {

                        map.clearOverlays();

                        var center = map.getCenter();

                        var marker = new GMarker(center, {draggable: true});

                        map.addOverlay(marker);

                        //document.getElementById("lat").innerHTML = center.lat().toFixed(7);

                        document.getElementById("endroit_longitude").value = center.lng().toFixed(7);
                        document.getElementById("endroit_latitude").value = center.lat().toFixed(7);

                        //document.getElementById("lng").innerHTML = center.lng().toFixed(7);



                        GEvent.addListener(marker, "dragend", function() {

                            var pt = marker.getPoint();

                            map.panTo(pt);

                            //document.getElementById("lat").innerHTML = pt.lat().toFixed(7);

                            document.getElementById("endroit_longitude").value = pt.lng().toFixed(7);
                            document.getElementById("endroit_latitude").value = pt.lat().toFixed(7);

                            //document.getElementById("lng").innerHTML = pt.lng().toFixed(7);

                        });

                    });

                }

            }

        );

    }

}