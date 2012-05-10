<ul>
<?php foreach($pager->getResults() as $producto):?>
  <?php include_partial('productos/producto_list',array('producto' => $producto))?>
<?php endforeach;?>
</ul>
<?php include_partial('global/pager_lucene', array(
  'pager' => $pager,
  'url' => 'buscar/producto',
  'query' => $query,
  'description' => 'resultados encontrados en los productos',
))?>