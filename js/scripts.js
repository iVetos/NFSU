$(function(){
    var slider = new MasterSlider();
    slider.control('arrows');
    slider.control('bullets' ,{autohide:false});
    slider.setup('masterslider' , {
        width:1140,
        height:580,
        //space:100,
        fullwidth:true,
        speed:18,
        view:'basic',
        loop:true,
        autoplay:true
    });

    var slider2 = new MasterSlider();
    slider2.setup('masterslider2' , {
        loop:true,
        width:220,
        height:300,
        speed:20,
        view:'wave',
        preload:0,
        space:0,
        wheel:true
    });
    slider2.control('arrows');
    slider2.control('slideinfo',{insertTo:'#staff-info'});
});
/*
var map;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
    });
}*/