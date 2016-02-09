$(document).ready(function(){

var MyMap;
var MyMapMarkers = new Array();

function initMyMap() {
	// set up the map
	MyMap = new L.Map("mt_map");

	// create the tile layer with correct attribution
	var osmUrl="http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
	var osmAttrib="";
	var osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 17, attribution: osmAttrib});		

	// start the map in Dushanbe
	MyMap.setView(new L.LatLng(38.57,68.7781477), 13);
	MyMap.addLayer(osm);
	// dont show powered ... text
	MyMap.attributionControl.setPrefix("");

}

function initMyMapMarkers() {

	// define markers
	var markers = [
[68.80597829818726,38.563393215861524, "Мактаби № 15", "ш.Душанбе, куч. Айнӣ 49"],
[68.80027055740356,38.54945760342899, "Мактаби № 16", "ш.Душанбе, куч. Титов 2а"]
	];
	// console.log("markers: " + markers);

	// icons
	var blueIcon = L.icon({
	    iconUrl: "ui/ext/map/images/azure.png",
	    shadowUrl: "ui/ext/map/images/marker-shadow.png",
	    iconSize:     [41, 41], // size of the icon
	    shadowSize:   [41, 41], // size of the shadow
	    iconAnchor:   [22, 40], // point of the icon which will correspond to marker location
	    shadowAnchor: [10, 40], // the same for the shadow
	    popupAnchor:  [-2, -35] // point from which the popup should open relative to the iconAnchor
	});

	//Loop through the markers array
    for (var i=0; i<markers.length; i++) {
        if (markers[i][0]>0 && markers[i][1]>0){
            var lon = markers[i][0];
            var lat = markers[i][1];
            var popupText = "<p class=\"xpopup\"> \
            <strong>"+markers[i][2]+"</strong> \
            <br/><strong>Суроға: </strong>"+markers[i][3]+" \
            </p>";
            var markerLocation = new L.LatLng(lat, lon);
            var marker = new L.Marker(markerLocation, {icon: blueIcon});
            MyMap.addLayer(marker);
            MyMapMarkers.push(marker);
            marker.bindPopup(popupText,{
                minWidth: 230
            });
        }
    }

}

function removeMyMapMarkers() {
	for (i=0;i<MyMapMarkers.length;i++) {
		MyMap.removeLayer(MyMapMarkers[i]);
	}
	MyMapMarkers=[];
}


initMyMap();


$("#markers").click(function(){
	initMyMapMarkers();
});

$("#clear").click(function(){
	removeMyMapMarkers();
});


});