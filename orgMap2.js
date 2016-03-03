
function newFunction() {    /* Map Object */
      var mapObj = new GMaps({
        el: '#map',
  lat: 47.622868,
  lng: -122.336553,
  click: function(e) {
    alert('You clicked on the map');
  },
  zoom_changed: function(e) {
    alert('You zoomed the map');
  }
  
});
var m = mapObj.addMarker({
  lat: 47.622868,
  lng: -122.336553,
  title: 'Amazon',
  infoWindow: {
    content: '<h4>Amazon Headquarters</h4><div>440 Terry Ave N, Seattle, WA 98109</div><div>Seattle, Wa</div>',
    maxWidth: 100
  }
});
mapObj.addMarker({
  lat: 48.8553701,
  lng: 2.2944813,
  mouseover: function(e) {
    alert('Triggered');
  }
});
};

