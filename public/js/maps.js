window.initMap = function () {
    const defaultLoc = { lat: 0 , lng: 0 };
    const map = new google.maps.Map(document.getElementById("map"), {
        center: defaultLoc,
        zoom: 13,
    });

    const marker = new google.maps.Marker({
        position: defaultLoc,
        map: map,
        draggable: true
    });

    // Set initial lat/long input
    document.querySelector('input[placeholder="Lat lokasi"]').value = defaultLoc.lat;
    document.querySelector('input[placeholder="Long lokasi"]').value = defaultLoc.lng;

    // Update lat/long on marker drag
    marker.addListener('dragend', function (e) {
        updateLatLngInputs(e.latLng.lat(), e.latLng.lng());
    });

    // Update marker and lat/long on map click
    map.addListener('click', function (e) {
        marker.setPosition(e.latLng);
        updateLatLngInputs(e.latLng.lat(), e.latLng.lng());
    });

    function updateLatLngInputs(lat, lng) {
        document.querySelector('input[placeholder="Lat lokasi"]').value = lat;
        document.querySelector('input[placeholder="Long lokasi"]').value = lng;
    }
};