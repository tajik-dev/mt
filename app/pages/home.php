<?php
$this->pos['main']='
<div class="jumbotron text-center">
    <h1 style="font-size:40px; line-height: 1.4;">
    <strong>'.\CORE::t('proj_title','OPEN DATA OF EDUCATIONAL FACILITIES OF DUSHANBE CITY').'
    </strong>
    </h1>
</div>
<div class="row" style="margin-bottom:42px;">
	<div class="col-sm-4">
		<div class="main_icon_1">
			<a href="./?c=od">
				<div class="main_icon main_icon_od"></div>
				'.\CORE::t('opendata','Open Data').'
			</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="main_icon_1">
			<a href="./?c=map">
				<div class="main_icon main_icon_map"></div>
				'.\CORE::t('map','Map').'
			</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="main_icon_1">
			<a href="./?c=apps">
				<div class="main_icon main_icon_app"></div>
				'.\CORE::t('app_frm','Application form').'
			</a>
		</div>
	</div>	
</div>
<div class="row">
	<h4 class="text-center" style="color:#dc3300;font-weight:bold;">
	<span>Харитаи муассисаҳои таълимии ш. Душанбе</span></h4>
	<div id="mt_map" style="height:480px;margin:0px 18px;border:1px solid #D9D9D9;border-radius:8px;"></div>
</div>
';
$this->pos['link'].='<link rel="stylesheet" href="./ui/ext/map/css/leaflet.css" />';
$this->pos['js'].='
<script type="text/javascript" src="./ui/ext/map/js/leaflet.js"></script>
<script type="text/javascript" src="./ui/ext/map/js/singleclick.js"></script>
<script type="text/javascript">
$(document).ready(function(){

var MyMap;
var MyMarkers = new Array();
var mySelMarkers = new Array();
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
	MyMap = new L.Map("mt_map");
	var osmUrl="http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
	var osmAttrib="";
	var osm = new L.TileLayer(osmUrl, {zoomControl: false});	
	MyMap.setView(new L.LatLng(38.57,68.7781477), 14);
	MyMap.addLayer(osm);
	MyMap.attributionControl.setPrefix("");

	// Disable drag and zoom handlers.
	MyMap.scrollWheelZoom.disable();

}

function getMyIcon(IconColor){
	var myIcon = L.icon({
	    iconUrl: "ui/ext/map/images/" + IconColor + ".png",
	    shadowUrl: "ui/ext/map/images/marker-shadow.png",
	    iconSize:     [41, 41],
	    shadowSize:   [41, 41],
	    iconAnchor:   [22, 40],
	    shadowAnchor: [10, 40],
	    popupAnchor:  [-2, -35]
	});
	return myIcon;
}

function showMyMarkers(markers) {
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
initMyMap();
initMyMarkers();


});
</script>
';