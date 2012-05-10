window.addEvent('domready',function(){
	$$('a.link_search').each(function(link){
		link.addEvent('click', function(){
			//alert('click: '+ link.get('href'));
			new Request.HTML({
				url: link.get('href'),
				update: 'buscador_container'
			}).send();
			return false;
		});
	});
});
