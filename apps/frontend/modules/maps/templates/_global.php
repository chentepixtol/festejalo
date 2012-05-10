<div id="map_global" style="width:<?php echo $width?>px;height:<?php echo $height?>px"></div>
<?php slot('script1')?>
<script type="text/javascript">

  var points = [];
  var markets_text = [];

  window.addEvent('domready', function(){
	  var temp_text;
    <?php foreach($ubicaciones as $ubicacion):?>
      points.push(new GLatLng(<?php echo $ubicacion->getLatitud()?>, <?php echo $ubicacion->getLongitud()?>));
      temp_text =  "<a href='<?php echo url_for('show_empresa',$ubicacion->getEmpresa())?>' class='ajax' ><?php echo $ubicacion->getEmpresa()?></a>";
      markets_text.push(temp_text); 
    <?php endforeach;?>

    cargarMapa(); 
  });
</script>
<?php end_slot()?>