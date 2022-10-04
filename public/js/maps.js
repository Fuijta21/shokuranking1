function initMap(){
    map = document.getElementById("map");


    let No1 = {lat:Laravel.shop[0].coordinates.latitude, lng: Laravel.shop[0].coordinates.longitude};
    let No2 = {lat:Laravel.shop[1].coordinates.latitude, lng: Laravel.shop[1].coordinates.longitude};
    let No3 = {lat:Laravel.shop[2].coordinates.latitude, lng: Laravel.shop[2].coordinates.longitude};
    let No4 = {lat:Laravel.shop[3].coordinates.latitude, lng: Laravel.shop[3].coordinates.longitude};
    let No5 = {lat:Laravel.shop[4].coordinates.latitude, lng: Laravel.shop[4].coordinates.longitude};
    //let tokyoTower = {lat: 35.6585769, lng: 139.7454506};
    opt = {
        zoom: 13,
        center:No1,
    };
    
    mapObj = new google.maps.Map(map,opt);
    
    marker_No1 = new google.maps.Marker({
        position: No1,
        map:mapObj,
        title: Laravel.shop[0].name,
    });
    marker_No2 = new google.maps.Marker({
        position: No2,
        map:mapObj,
        title: Laravel.shop[1].name,
    });
    marker_No3 = new google.maps.Marker({
        position: No3,
        map:mapObj,
        title: Laravel.shop[2].name,
    });
    marker_No4 = new google.maps.Marker({
        position: No4,
        map:mapObj,
        title: Laravel.shop[3].name,
    });
    marker_No5 = new google.maps.Marker({
        position: No5,
        map:mapObj,
        title: Laravel.shop[4].name,
    });
}
