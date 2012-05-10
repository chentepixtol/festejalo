<h1>Editar Ubicación</h1>
<script type="text/javascript">
	$(window).addEvent('domready', function()
	{
		$('button_gmaps').addEvent('click', function(){
			var url = "/backend.php/ubicacion/coordenadas/empresa_id/" + <?php echo $sf_user->getAttribute('empresa_id') ?>;

			var request = new Request.JSON({
               url: url,
               onSuccess:  function(data){
                  $('ubicacion_latitud').set('value', data.latitud);
                  $('ubicacion_longitud').set('value', data.longitud);
		       }
			}).send();
			
		});
	});
</script>
<?php include_partial('form', array('form' => $form)) ?>
