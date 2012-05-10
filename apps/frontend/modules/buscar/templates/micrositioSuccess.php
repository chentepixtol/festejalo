
<ul>
  <?php foreach($pager->getResults() as $micrositio):?>
    <?php include_partial('empresas/empresa_list', array('empresa' => $micrositio->getEmpresa() ))?>
  <?php endforeach;?>
</ul>

<?php include_partial('global/pager_lucene', array(
  'pager' => $pager,
  'url' => 'buscar/micrositio',
  'query' => $query,
  'description' => 'resultados encontrados en los micrositios',
))?>