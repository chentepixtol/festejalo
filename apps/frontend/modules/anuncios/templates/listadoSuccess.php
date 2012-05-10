<?php slot('pagetitle',"Anuncios Publicitarios")?>

<ul>
    <?php foreach ($pager->getResults() as $banner): ?>
      <?php include_partial('anuncio_list', array('banner' => $banner))?> 
    <?php endforeach; ?>
</ul>  

<?php include_partial('global/pager_simple',array(
  'pager' => $pager,
  'url' => 'anuncios/listado',
  'description' => 'Anuncios indexados.'
))?>
