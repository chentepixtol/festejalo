<?php slot('pagetitle',"Productos")?>
<ul>
  <?php foreach($pager->getResults() as $producto): ?>
    <?php include_partial('productos/producto_list',array('producto' => $producto))?>
  <?php endforeach;?>
</ul>
<?php include_partial('global/pager_simple',array(
  'pager' => $pager,
  'url' => 'productos/listado',
  'description' => 'productos indexados.',
))?>