<?php slot('title', sfConfig::get('app_page_title') . " - Noticias de ". $empresa )?>
<?php Fonacot::start()?>
  <a href="<?php echo url_for('@homepage') ?>">Inicio</a>  >> 
  <a href="<?php echo url_for('empresas/listado')?>" class="ajax">Empresas</a> >>
  <a href="<?php echo url_for('show_empresa',$empresa)?>" class="ajax" ><?php echo $empresa->getNombre()?></a> >>
  Noticias
<?php $breadcum = Fonacot::stop()?>

<ul>
    <?php foreach ($list_noticias as $noticia): ?>
      <?php include_partial('noticias/noticia_list', array('noticia' => $noticia))?>
    <?php endforeach; ?>
</ul>

<?php include_partial('global/ajax_request', array(
  'pagetitle' => $empresa->getNombre() . " - Noticias",
  'breadcum' => $breadcum,
))?> 