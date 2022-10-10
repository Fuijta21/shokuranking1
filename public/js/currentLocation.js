function initMap(){


    latlng = new google.maps.LatLng(Laravel.lat, Laravel.lng);
    //let lats = {lat:Laravel.lat, lng: Laravel.lng};
    //let latlng = {lat:36.63319233271326, lng:138.1860274233947};
    map = document.getElementById('map');
    opt = {
        zoom:2,
        center:latlng,
    };
    mapObj = new google.maps.Map(map, opt);
    marker = new google.maps.Marker({
        position: latlng,
        map: mapObj,
        title:'現在地'
    });
}