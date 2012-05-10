 var Fonacot = {};
 Fonacot.update = function(){
   var temp = $$('.tooltip');
   if(temp.length == 2) temp[1].destroy();
   SqueezeBox.assign($$('#main_content a[rel=box]'),{
   	size: {x: 590, y:490 }
   });
   var tips = $$('#main_content a.tip');
   if(tips.length != 0 ) new Tips(tips, {className: 'tooltip'});
   new AniLink('#main_content a.AniLink');
     
   if($('main_content').get('html').match(/rel=?.lightbox/i)) new Lightbox();
   
 }
 
 var Festejalo = {};
 
 new Request.JSON({
     url: '/home/json',
	 onSuccess: function(data){
	 	Festejalo = data;
	 }
   }).send();
 
 window.addEvent('domready',function(){
	
   $E = $(document).getElement.bind(document.body);
   
   SqueezeBox.assign($$('a[rel=box]'),{
   	size: {x: 590, y:490 }
   });
   
   new Tips($$('a.tip'),{className: 'tooltip'});
   new AniLink('a.AniLink');
   
   var search_field = $('query');
   new Autocompleter.Ajax.Json(search_field, '/home/autocomplete', { 
      'minLength': 3,
	  postVar: 'query' 
   });
   
   
   $(document.body).addLiveEvent('click','a.ajax',function(e){
   	 e.stop();
     $('main_content').set('html',"Cargando Elemento...");
	 var parameters = $(this).hasClass('cache') ? '/index/cache/ajax' : '?cache=ajax'; 
     $('main_content').set('load',{
	 	onSuccess: function(){
			Fonacot.update();
		}
	 }).load(this.href + parameters);
   })
   
   var nS1 = new noobSlide({
			box: $('slide1'),
			items: [0,1],
			size: 285,
			fxOptions: {
				duration: 1000,
				transition: 'bounce:out',
				wait: false
			},
			autoPlay: true
		});
	 if ($('slide_banner_categoria')) {
	 	var bannerCategorySlide = new noobSlide({
	 		box: $('slide_banner_categoria'),
	 		items: [0, 1],
	 		size: 285,
	 		fxOptions: {
	 			duration: 1000,
	 			transition: 'back:out',
	 			wait: false
	 		},
	 		autoPlay: true
	 	});
	 }
	 
	 if ($('slide_banner_segmento')) {
	 	var bannerSegmentoSlide = new noobSlide({
	 		box: $('slide_banner_segmento'),
	 		items: [0, 1],
	 		size: 285,
	 		fxOptions: {
	 			duration: 1000,
	 			transition: 'back:out',
	 			wait: false
	 		},
	 		autoPlay: true
	 	});
	 }
 });
