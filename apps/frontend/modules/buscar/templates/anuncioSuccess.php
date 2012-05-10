<ul>
  <?php foreach($pager->getResults() as $anuncio):?>
    <?php include_partial('anuncios/anuncio_list', array('banner' => $anuncio))?>
  <?php endforeach;?>
</ul>

<?php include_partial('global/pager_lucene', array(
  'pager' => $pager,
  'url' => 'buscar/anuncio',
  'query' => $query,
  'description' => 'resultados encontrados en anuncios',
))?>