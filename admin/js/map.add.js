// Google map
function initMap() {
    var mapDiv = document.getElementById('map');
    var marker;
    var map = new google.maps.Map(mapDiv, {
        zoom: 12,
        center: new google.maps.LatLng(49.99140828271529, 36.2303352355957)
    });

    // We add a DOM event here to show an alert if the DIV containing the
    // map is clicked.
    /*google.maps.event.addDomListener(mapDiv, 'click', function() {

     alert('Map was clicked!');
     });*/

    google.maps.event.addListener(map, "click", function(event) {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();

        var coords = lat + ', ' + lng;
        $('#map-coords').val(coords);

        if(typeof marker != 'undefined'){
            marker.setMap(null);
        }

        var myLatLng = {lat: lat, lng: lng};
        marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            title: '',
            icon: '/admin/img/icons/map.png'
        });

        google.maps.event.addListener(marker, 'dragend', function(){
            lat = marker.getPosition().lat();
            lng = marker.getPosition().lng();
            $('#map-coords').val(lat + ', ' + lng);
        });
    });
}