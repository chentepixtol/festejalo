<?php slot('title', sfConfig::get('app_page_title') . ' - Anuncios de ' . $empresa->getNombre())?>
<?php slot('description', "Anuncios de la empresa " . $empresa->getNombre())?>
<?php Fonacot::start()?>
  <a href="<?php echo url_for('@homepage') ?>">Inicio</a>  >> 
  <a href="<?php echo url_for('empresas/listado')?>" class="ajax">Empresas</a> >>
  <a href="<?php echo url_for('show_empresa',$empresa)?>" class="ajax"><?php echo $empresa->getNombre()?></a> >>
  Anuncios
<?php $breadcum = Fonacot::stop()?>

<ul>
  <?php foreach($anuncios as $anuncio):?>
    <li>
      <a href="<?php echo url_for('show_banner', $anuncio)?>" class="ajax">
        <?php echo $anuncio->getTitulo()?>
      </a>
    </li>
  <?php endforeach;?>
</ul>

<?php include_partial('global/ajax_request', array(
  'pagetitle' => "Anuncios",
  'breadcum' => $breadcum,
))?> 