function initMap(){//指定された緯度と経度を中心とした地図が表示され、その位置にマーカーが追加


    latlng = new google.maps.LatLng(Laravel.lat, Laravel.lng);//緯度と経度
    //let lats = {lat:Laravel.lat, lng: Laravel.lng};
    //let latlng = {lat:36.63319233271326, lng:138.1860274233947};
    map = document.getElementById('map');
    opt = {//地図のオプション
        zoom:2,//縮尺度
        center:latlng,//中心
    };
    mapObj = new google.maps.Map(map, opt);//マップ作成
    marker = new google.maps.Marker({//マーカー作成
        position: latlng,
        map: mapObj,
        title:'現在地'
    });
}