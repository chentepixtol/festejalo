<?php Fonacot::start()?>
   <a href="<?php echo url_for('@homepage') ?>">Inicio</a>  >> Empresas
<?php $breadcum = Fonacot::stop()?>
<ul>
    <?php foreach ($pager->getResults() as $empresa): ?>
       <?php include_partial('empresa_list', array('empresa' => $empresa))?>
    <?php endforeach; ?>
</ul>  

<?php include_partial('global/pager_simple',array(
  'pager' => $pager,
  'url' => 'empresas/listado',
  'description' => 'Empresas indexadas.'
))?>

<?php include_partial('global/ajax_request',array(
  'pagetitle' => "Empresas",
  'breadcum' => $breadcum,
))?>
