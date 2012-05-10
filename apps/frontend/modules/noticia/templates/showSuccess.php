<?php slot('title', sfConfig::get('app_page_title') . " - " . $noticia->getTitulo())?>
<?php slot('description', $noticia->getDescription())?>
<?php Fonacot::start()?>
  <a href="<?php echo url_for('@homepage') ?>">Inicio</a>  >> 
  <a href="<?php echo url_for('empresas/listado')?>" class="ajax">Empresas</a> >>
  <a href="<?php echo url_for('show_empresa',$empresa)?>" class="ajax"><?php echo $empresa->getNombre()?></a> >>
  <a href="<?php echo url_for('list_noticia', $empresa)?>" class="ajax">Noticias</a> >>
  <?php echo $noticia->getTitulo()?>
<?php $breadcum = Fonacot::stop()?>

<p><?php echo $noticia->getTexto() ?></p>
<?php include_partial('global/ajax_request',array(
  'pagetitle' => $noticia->getTitulo(),
  'breadcum' => $breadcum,
))?>