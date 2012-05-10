/**
 * @author chente
 */

function createInfoMarker(point, address){
    var marker = new GMarker(point);
    GEvent.addListener(marker, "click", function(){
        marker.openInfoWindowHtml(address);
    });
    return marker;
}

function cargarMapa(){
    if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_global"));
        
        map.setCenter(new GLatLng(Festejalo.coord_df.x, Festejalo.coord_df.y), 10);
        
        map.addControl(new GLargeMapControl());
        
        $each(points, function(point, index){
            var marker = createInfoMarker(point, markets_text[index]);
            map.addOverlay(marker);
        });
		GEvent.addListener(map,'dragend',function(){
			var LatInf = map.getBounds().getSouthWest().lat();
			var LatSup = map.getBounds().getNorthEast().lat();
			var LngInf = map.getBounds().getSouthWest().lng();
			var LngSup = map.getBounds().getNorthEast().lng();
			var dataString = '?lati='+LatInf+'&lats='+LatSup+'&lngi='+LngInf+'&lngs='+LngSup;
			var	url = '/maps/empresasByPosition';
			$('main_content').load(url + dataString);
		});  
    }
}
