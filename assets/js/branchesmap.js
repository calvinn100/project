var $map, $autocomplete, $marker, latitude, longitude, address, splitaddress, countryfrommap, statefrommap, cityfrommap, splitaddresslength;
function initialize() {
			var auto_complete_input = document.getElementById('place_autocomplete'); // search field in the map modal
			var auto_complete_options = {componentRestrictions: {'country': 'ind'}}; // limited search by india
			var lanlng = new google.maps.LatLng(12.8505,73.2711); // default location given is kerala
			var map_options = {
					zoom: 7,
					center: lanlng,
					mapTypeId: google.maps.MapTypeId.HYBRID,
					disableDefaultUI: true
				};
		var map_loader = document.getElementById('map_view'); //div which map is loading
		$autocomplete = new google.maps.places.Autocomplete(auto_complete_input, auto_complete_options); // places auto completion
		$map = new google.maps.Map(map_loader, map_options); // map loading
		$marker = new google.maps.Marker({ // map options
				position: lanlng,
				map: $map,
				draggable: true,
				animation: google.maps.Animation.DROP,
				title: 'Click me',
				visible: false
	});
	google.maps.event.addListener($autocomplete, "place_changed", getSelectedplace); // getting datas of changed place
	google.maps.event.addListener($marker, "dragend", function (event) {
			latitude = this.getPosition().lat(); // changed latitude
			longitude = this.getPosition().lng() // changed longitude
	});
}

function getSelectedplace() {
var place = $autocomplete.getPlace();
if (!place.geometry) {
	alert("Your Searched place not found!.Plase use the makers to point to your location to get the GeoCordinates");
	return;
} else {
		var location = place.geometry.location;
		latitude = place.geometry.location.lat();
		longitude = place.geometry.location.lng();
		$map.panTo(location);
		$map.setZoom(16);
		$marker.setPosition(location);
		$marker.setVisible(true);
		$marker.setAnimation(google.maps.Animation.BOUNCE);
		console.log(place);
		alert("Plase Select your exact position.\n1.Drag the marker to your location\n2.Use mouse to scroll and pan arround the map\n3.Locate your position and Drop the marker there");
		address = place.formatted_address; // gets the formated address of the selected place from places object
console.log(address);
		splitaddress = address.split(","); // spliting the array
		console.log(splitaddress);
		splitaddresslength = splitaddress.length;
		if(splitaddresslength <= 2) {
			countryfrommap = splitaddress[splitaddresslength - 1]; // always the last one in array is country
			statefrommap = splitaddress[splitaddresslength - 2]; // and the second last one in array is state
			cityfrommap = splitaddress[splitaddresslength - 2];  // and same as above the third last one will be city
		}
		else {
			countryfrommap = splitaddress[splitaddresslength - 1]; // always the last one in array is country
			statefrommap = splitaddress[splitaddresslength - 2]; // and the second last one in array is state
			cityfrommap = splitaddress[splitaddresslength - 3]; // and same as above the third last one will be city
		}
		$('.selectedlocation').val(address); // into full location field
		$('#citylocation').val(cityfrommap); // into city field
		$('#statelocation').val(statefrommap); // into state field
		$('#countrylocation').val(countryfrommap); // into country field
		$('.latvalue').val(latitude); // into hidden latitude
		$('.lonvalue').val(longitude); // into hidden longitude
	}
}

$(document).ready(function () {
initialize();
$('.select_location').focus(function () {
	console.log("focused");
	var location_input = $(this);
	var $modal = $('#locationSelectModal');
	var lan_input = $('input[name=latitude]');
	var lng_input = $('input[name=longitude]');
	var $modal_submit = $modal.find('button.save_location');
	$modal.modal('show').on('shown.bs.modal', function () {google.maps.event.trigger($map, "resize");});
});
});
