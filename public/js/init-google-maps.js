var map;
var latitude = parseFloat(document.getElementById('lat').value);
var long = parseFloat(document.getElementById('long').value);
console.log(latitude, long)

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: latitude, lng: long},
        zoom: 13,
    });
    var marker = new google.maps.Marker({
        position: {lat: latitude, lng: long},
        map: map,
    title: 'Your city'
    });
}