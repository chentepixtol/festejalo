<?php slot('title', sfConfig::get('app_page_title'). " - Mapa de ".$empresa)?>
<?php slot('pagetitle',$empresa . " - Mapa")?>
<?php slot('description', $ubicacion->getCalle() . ", " . $ubicacion->getColonia(). ", " . $ubicacion->getDelegacion()  )?>
<?php slot('breadcum')?>
  <a href="<?php echo url_for('@homepage') ?>">Inicio</a>  >> 
  <a href="<?php echo url_for('empresas/listado')?>">Empresas</a> >>
  <a href="<?php echo url_for('show_empresa',$empresa)?>" /><?php echo $empresa->getNombre()?></a> >>
  Mapa
<?php end_slot()?>

<?php include_partial('ubicacion',array('ubicacion'=>$ubicacion)) ?>

<div id="map" style="width:560px;height:420px">
</div>
<script type="text/javascript">
 
    	function createInfoMarker(point, address) {    
            var marker = new GMarker(point);
            GEvent.addListener(marker, "click",function() {
                marker.openInfoWindowHtml(address);
            });
            return marker;
        }

        function cargarMapa(){
            if (GBrowserIsCompatible()) {
                var map = new GMap2(document.getElementById("map"));

	            map.setCenter(new GLatLng(<?php echo $ubicacion->getLatitud()?>, <?php echo $ubicacion->getLongitud()?>), 14);                

                map.addControl(new GLargeMapControl());
				
				var point = new GLatLng(<?php echo $ubicacion->getLatitud() ?>, <?php echo $ubicacion->getLongitud()?>);
                var messaje = "<?php echo $ubicacion->getEmpresa()?>: <? echo $ubicacion->getColonia()?>, <?php echo $ubicacion->getCalle()?> <?php echo $ubicacion->getNumero()?>";
                var marker = createInfoMarker(point, messaje);
                map.addOverlay(marker);
    

            }
        }
 		
    cargarMapa();	
    	
</script>
