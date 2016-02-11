<?php
namespace APP\MVC\V;

class MAP_V {

public function main($model){
	$UI=\CORE\UI::init();
	$result='<div class="row">
	<div id="mt_map" style="height:478px;"></div>
</div>';
	$UI->pos['link'].='<link rel="stylesheet" href="./ui/ext/map/css/leaflet.css" />';
	$UI->pos['js'].='
<script type="text/javascript" src="./ui/ext/map/js/leaflet.js"></script>
<script type="text/javascript" src="./ui/ext/map/js/singleclick.js"></script>
<script type="text/javascript">
$(document).ready(function(){

$("#mt_map").height($(window).height()-180); // change map box height on start

var MyMap; // map
var MyMarkers = new Array(); // markers layer
var MyIcons = {
	type1: getMyIcon("green"), // kudakiston
	type2: getMyIcon("azure"), // maktab
	type3: getMyIcon("pink"), // maktab-internat
	type4: getMyIcon("yellow") // ilovagi
};

function IsJsonString(str) {
	try { JSON.parse(str); } catch(e) { return false; }
	return true;
}

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
	// dont show powered ...
	MyMap.attributionControl.setPrefix("");

}

function getMyIcon(IconColor){
	var myIcon = L.icon({
	    iconUrl: "ui/ext/map/images/" + IconColor + ".png",
	    shadowUrl: "ui/ext/map/images/marker-shadow.png",
	    iconSize:     [41, 41], // size of the icon
	    shadowSize:   [41, 41], // size of the shadow
	    iconAnchor:   [22, 40], // point of the icon which will correspond to marker location
	    shadowAnchor: [10, 40], // the same for the shadow
	    popupAnchor:  [-2, -35] // point from which the popup should open relative to the iconAnchor
	});
	return myIcon;
}

function showMyMarkers(markers) {

	// example: [[LNG, LAT, GEO_ID, MT_TYPE_ID, "NAME", "ADDRESS"],[LNG2, LAT2, GEO_ID2, MT_TYPE_ID2, "NAME2", "ADDRESS2"]]

	// you can define markers manually
	// var markers = [];

	//Loop through the markers array
    for (var i=0; i<markers.length; i++) {
        if (markers[i][0]>0 && markers[i][1]>0){
            var lng = markers[i][0];
            var lat = markers[i][1];
            var popupText = "<p class=\"xpopup\"> \
            <strong>"+markers[i][4]+"</strong> \
            <br/><strong>'.\CORE::t('address','Address').': </strong>"+markers[i][5]+" \
            </p>";
            var markerLocation = new L.LatLng(lat, lng);
            var marker = new L.Marker(markerLocation, {icon: MyIcons[ "type" + markers[i][3] ]});
            MyMap.addLayer(marker);
            MyMarkers.push(marker);
            marker.bindPopup(popupText,{
                minWidth: 230
            });
        }
    }

}

function removeMyMarkers() {
	for (i=0;i<MyMarkers.length;i++) {
		MyMap.removeLayer(MyMarkers[i]);
	}
	MyMarkers=[];
}

function initMyMarkers(){
	$.post("./?c=od&act=mt&format=json&ajax",{
		filter_geo:0,
		filter_type:0,
		filter_id:0
	},function(data){
	    if(IsJsonString(data)){
			showMyMarkers(JSON.parse(data));
		} else { console.log("failed to get json: "+data); }
	});
}

// run
initMyMap(); // show just map
initMyMarkers() // init markers (ajax!) 


});
</script>
';
	return $result;
}


}