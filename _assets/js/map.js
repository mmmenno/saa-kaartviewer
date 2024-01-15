$(document).ready(function() {

    var urlparams = get_query();
    createMap();

    document.body.onkeydown = function(e){
        if(e.keyCode == 32){
            if(!$("input").is(":focus")){
                e.preventDefault();
                tileLayer.setOpacity(0);
            }
            
            
        }
    };
    document.body.onkeyup = function(e){
        if(e.keyCode == 32){
            tileLayer.setOpacity(1)
        }
    };

    $("#layerlinks a").on( "click", function(e) {
        e.preventDefault();
        layerid = $(this).attr("id");
        //console.log(layerid);

        removeLayers();

        if(layerid == "layer1876"){
            tileLayer = layer1876.addTo(map);
        }
        if(layerid == "layer1909"){
            tileLayer = layer1909.addTo(map);
        }
        if(layerid == "layer1943"){
            tileLayer = layer1943.addTo(map);
        }
        if(layerid == "layer1985"){
            tileLayer = layer1985.addTo(map);
        }
        
    });
    

});

function removeLayers(){
    if(map.hasLayer(layer1876)){
        map.removeLayer(layer1876);
    }
    if(map.hasLayer(layer1909)){
        map.removeLayer(layer1909);
    }
    if(map.hasLayer(layer1943)){
        map.removeLayer(layer1943);
    }
    if(map.hasLayer(layer1985)){
        map.removeLayer(layer1985);
    }
}

function createMap(){

    $('#subheader').css("padding-top","0");
    center = [52.370216, 4.895168];
    zoomlevel = 15;
    
    map = L.map('map', {
      center: center,
      zoom: zoomlevel,
      minZoom: 1,
      maxZoom: 19,
      scrollWheelZoom: true,
      zoomControl: false
    });

    L.control.zoom({
        position: 'bottomright'
    }).addTo(map);

    overviewLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ',
      maxZoom: 16,
      minZoom: 0
    }).addTo(map);
    

    baseLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        minZoom: 15,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    layer1876 = L.tileLayer('https://images.huygens.knaw.nl/webmapper/maps/loman/{z}/{x}/{y}.jpeg', {
        attribution: 'map provided by HicSuntLeones',
        maxZoom: 19,
        minZoom:13
    });

    layer1909 = L.tileLayer('https://tiles.create.humanities.uva.nl/atm/publieke-werken-1909/{z}/{x}/{y}.png', {
        attribution: 'map provided by Bert Spaan',
        maxZoom: 19,
        minZoom:13
    });

    layer1943 = L.tileLayer('https://tiles.create.humanities.uva.nl/atm/publieke-werken-1943/{z}/{x}/{y}.png', {
        attribution: 'map provided by Bert Spaan',
        maxZoom: 19,
        minZoom:13
    });

    layer1985 = L.tileLayer('https://tiles.create.humanities.uva.nl/atm/publieke-werken-1985/{z}/{x}/{y}.png', {
        attribution: 'map provided by Bert Spaan',
        maxZoom: 19,
        minZoom:13
    });

    tileLayer = layer1943.addTo(map);

}

function get_query(){
    var url = document.location.href;
    var qs = url.substring(url.indexOf('?') + 1).split('&');
    for(var i = 0, result = {}; i < qs.length; i++){
        qs[i] = qs[i].split('=');
        result[qs[i][0]] = decodeURIComponent(qs[i][1]);
    }
    return result;
}


  


