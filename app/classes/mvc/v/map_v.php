<?php
namespace APP\MVC\V;

class MAP_V {

public function mt_types_list($model){
	$result='';
    $mt_types=$model->get_mt_types();
    $result=\CORE\UI::init()->html_list($mt_types,'',' id="type_filter" class="form-control"',
    	$model->sel_type,'-- '.\CORE::t('all_types','Все типы').' --');
	return $result;
}

public function mt_list($model){
	$result='';
    $mt=$model->get_mt($model->sel_type);
    $result=\CORE\UI::init()->html_list($mt,'',' id="id_filter" class="form-control"',
    	$model->sel_mt,'-- '.\CORE::t('all_facilities','Все учреждения').' --');
	return $result;
}

public function main($model){
	$UI=\CORE\UI::init();
	$result='<div class="row">
	<div id="mt_map" style="height:478px;"></div>
	<div id="mt_map_filter">
		<div class="text-center"><strong>Фильтр:</strong></div>
		<div id="type_filter_box">'.$this->mt_types_list($model).'</div>
		<div id="id_filter_box">'.$this->mt_list($model).'</div>
	</div>
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
var mySelMarkers = new Array(); // selected markers layer with circles
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
	var osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 18, attribution: osmAttrib});	

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

	// example: [[ID, LNG, LAT, GEO_ID, MT_TYPE_ID, "NAME", "ADDRESS"],[ID2, LNG2, LAT2, GEO_ID2, MT_TYPE_ID2, "NAME2", "ADDRESS2"]]

	// you can define markers manually
	// var markers = [];

	//Loop through the markers array
    for (var i=0; i<markers.length; i++) {
        if (markers[i][0]>0 && markers[i][1]>0){
            var lng = markers[i][1];
            var lat = markers[i][2];
            var popupText = "<div class=\"xpopup\"> \
            <div class=\"xpopup_title\"><strong>"+markers[i][5]+"</strong></div> \
            <div class=\"xpopup_addr\"><strong>'.\CORE::t('address','Адрес').':</strong> \
            "+(markers[i][6] || "")+"</div> \
            <div class=\"xpopup_more\"><a href=\"./?c=mt&act=view&id="+markers[i][0]+"\">'.\CORE::t('more...','Подробнее').'...</div> \
            </p>";
            var markerLocation = new L.LatLng(lat, lng);
            var marker = new L.Marker(markerLocation, {icon: MyIcons[ "type" + markers[i][4] ]});
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
	for (i=0;i<mySelMarkers.length;i++) {
		MyMap.removeLayer(mySelMarkers[i]);
	}
	mySelMarkers=[];
}

function initMyMarkers(f_geo,f_type,f_id){
	$.post("./?c=od&act=mt&map&ajax",{
		filter_geo: f_geo,
		filter_type: f_type,
		filter_id: f_id
	},function(data){
	    if(IsJsonString(data)){
			showMyMarkers(JSON.parse(data));
		} else { console.log("failed to get json: " + data); }
	});
}

function jumpTo(lng,lat) {
	//console.log("jumping to: lng: "+lng+" lat: "+lat);
	MyMap.setView(new L.LatLng(lat,lng),14);
	for(i=0;i<MyMarkers.length;i++) {
		if(MyMarkers[i]._latlng.lat==lat && MyMarkers[i]._latlng.lng==lng){
			MyMarkers[i].openPopup();
		}
	}
	var stuSplit = L.latLng(lat,lng);
	var mySelMarker = L.circleMarker(stuSplit, { title: "unselected" }).addTo(MyMap);
	mySelMarkers.push(mySelMarker);
}

function selectMyMarker(mt_id){
	$.post("./?c=map&act=getcoord&ajax",{ id: mt_id },function(data){
	    if(IsJsonString(data)){
			myCoord = JSON.parse(data);
			// console.log(myCoord);
			jumpTo(myCoord.lng,myCoord.lat);
		} else {
			console.log("failed to get coordinates via mt_id: \n" + data);
		}
	});
}

function MyMapFilter(mt_id){
	var mt_type = $("#type_filter").val();

	removeMyMarkers();
	initMyMarkers(0,mt_type,mt_id);

	$.post("./?c=map&act=mtlist&type="+mt_type+"&id="+mt_id+"&ajax",function(data){
	    $("#id_filter").html(data);
	});

}

// run
initMyMap(); // show just map
initMyMarkers() // init markers (ajax) 

// mt filtering


$("#type_filter").change(function(){
	MyMapFilter(0);
});

$("#id_filter").change(function(){
	var mt_id = $(this).val();
	//// MyMapFilter( mt_id );
	if(mt_id>0){
    	selectMyMarker( mt_id );
    }
});

});
</script>
';
	return $result;
}


}