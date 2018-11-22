// function initMap()
// {
//
//
//     var element = document.getElementById('map');
//     var options = {
//         zoom: 17,
//         center: {lat: 49.9935, lng: 36.2304}
//     };
//     var myMap = new google.maps.Map(element, options);
//
//     addMarker({
//         coordinates: {lat: 49.9935, lng: 36.2304},
//         info: '<h1>Адрес1 магазина </h1>'
//     });
//     function addMarker(properties){
//         var marker = new google.maps.Marker({
//             position: properties.coordinates,
//             map: myMap
//         });
//         if(properties.info)
//         {
//             var InfoWindow = new google.maps.InfoWindow({
//                 content: properties.info
//             });
//
//             marker.addListener('click', function(){
//                 InfoWindow.open(myMap, marker);
//             });
//         }
//     }
// }