window.addEvent('domready', function(){
   var roar = new Roar({
   	 duration: 5000
   });
   $$('.noticia').each(function(item, index){
   	 (function(){
	 	roar.alert("Noticia", item.get('html'));
	 }).delay(1000*index);
   });
});
