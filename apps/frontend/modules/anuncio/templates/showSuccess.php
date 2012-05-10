<?php use_helper('Text')?>
<?php slot('title', sfConfig::get('app_page_title') . " - " . $banner->getTitulo())?>
<?php slot('description', truncate_text($banner->getTexto(),150))?>
<?php Fonacot::start()?>
  <a href="<?php echo url_for('@homepage') ?>">Inicio</a>  >> 
  <a href="<?php echo url_for('empresas/listado')?>" class="ajax">Empresas</a> >>
  <a href="<?php echo url_for('show_empresa',$empresa)?>" class="ajax"><?php echo $empresa->getNombre()?></a> >>
  <a href="<?php echo url_for('list_banner', $empresa)?>" class="ajax">Anuncios</a> >>
  <?php echo $banner->getTitulo()?>
<?php $breadcum = Fonacot::stop()?>

<p><?php echo $banner->getTexto()?></p>
<img src="<?php echo $banner->getImagenUrl()?>" alt="<?php echo $banner->getTitulo()?>" />

<?php include_partial('global/ajax_request', array(
  'pagetitle' => $banner->getTitulo(),
  'breadcum' => $breadcum,
))?>