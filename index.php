<html>
<head>
  <meta charset="utf-8"/>
  <script src="http://code.jquery.com/jquery-1.11.3.js"></script>
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <style type="text/css">*{margin:0px;padding:0px}</style>
<script>
function check(s)
{
info=""
standard=/^.......xcportal.pl.sites.default.files.tracks.*$/
if (! s.value.match(standard))
info="Błędny link"
if (info)
alert(info)
s=""
}
</script>
 </head>
<body bgcolor='FFFFCC'>
  <b>Proszę podać link do pliku IGC:</b>
  <br/>  (używając xcportal.pl) 
  <form action="index.php" method="post">
  <input name="s" type="text" onBlur="check(this)"/>
  <input type="Submit" name="submit" value="Akceptuj" />
  </form>
  <br/>

<?php
global $z;

include 'model.php';
include 'view.php';
global $plk, $wynik1, $wynik2, $wynik3, $wynik4, $wynik5, $wynik6, $wynik7, $wynik8, $wynik9, $wynik0, $coords, $coord, $time, $j;

	$s=@$_POST['s'];
	if ("$s"!=false)
	{
	
	$plk=file("$s");
	
		
	$wynik1="nie ustalono";
	$wynik2="nie ustalono";
	$wynik3="nie ustalono";
	$wynik4="nie ustalono";
	$wynik5="nie ustalono";
	$wynik6="nie ustalono";
	$wynik7="nie ustalono";
	$wynik8="nie ustalono";
	$wynik9="nie ustalono";
	$wynik0="nie ustalono";
	$coords=array();
	$coord=array();
	$time=array();
	$j=0;

model();
view();
	}
?>

 <div id="gmap" style="width: 300px; height: 300px; position: absolute; right: 20px; top:10px" ></div>

<script>

var z = '<?= $z ?>';
var width,height; // save browser height/width

// initialize map
var map = new google.maps.Map(document.getElementById('gmap'),
{
  zoom: <?= $z ?>, // set zoom level to 14
  scrollwheel: false, // disable scrollwheel zooming
  mapTypeId: google.maps.MapTypeId.ROADMAP, // show roadmap format by default
  navigationControl: true, // enable nav controls
  navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL}, // small nav
  scaleControl: true, // enable map scale
});

// return gmaps lat/lng object from coords
function coord(lat,lng) { return new google.maps.LatLng(lat,lng); };

// construct a polyline and return object
// m = map object
// coords = array of gmap latlng objects
// color = color of line, defaults to red
// opacity = opacity of line, defaults to .5
// weight = thickness of line, defaults to 6
function polyline(m,coords,color,opacity,weight)
{
  if(!color) color = "navy";
  if(!opacity) opacity = 0.5;
  if(!weight) weight = 3;
  return new google.maps.Polyline(
  {
    path: coords,
    strokeColor: color,
    strokeOpacity: opacity,
    strokeWeight: weight
  }).setMap(m);
};

	
<?php

global $coords, $sr, $srlat, $srlon;

// center map on middle point
print "map.setCenter(coord($srlat, $srlon));";

$coords = implode(",",$coords);

// display polyline
print "polyline(map,[$coords]);";

?>
</script>
</body>
</html>
