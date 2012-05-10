<?php slot('title', sfConfig::get('app_page_title'). " - " . $producto->getNombre() )?>
<?php slot('pagetitle',$producto->getNombre())?>
<?php slot('description', $producto->getDescription())?>
<?php Fonacot::start()?>
  <a href="<?php echo url_for('@homepage') ?>" class="ajax">Inicio</a>  >> 
  <a href="<?php echo url_for('empresas/listado')?>" class="ajax">Empresas</a> >>
  <a href="<?php echo url_for('show_empresa',$empresa)?>" class="ajax"><?php echo $empresa->getNombre()?></a> >>
  <a href="<?php echo url_for('list_producto',$empresa)?>" class="ajax">Productos</a> >>
  <?php echo $producto->getNombre()?>
<?php $breadcum = Fonacot::stop()?>

<?php include_partial('producto_show',array('producto' => $producto))?>

<?php include_partial('global/ajax_request', array(
  'pagetitle' => $producto->getNombre(),
  'breadcum' => $breadcum,
))?>