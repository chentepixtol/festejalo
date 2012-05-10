<ul>
<?php foreach($pagerUbicacion->getResults() as $ubicacion):?>
  <li>
  <a href="<?php echo url_for('show_empresa',$ubicacion->getEmpresa())?>"><?php echo $ubicacion->getEmpresa()->getNombre()?></a>
  <?php include_partial('maps/ubicacion', array('ubicacion' => $ubicacion))?>
  </li>
<?php endforeach;?>
</ul>
<?php include_partial('global/pager_lucene', array(
  'pager' => $pagerUbicacion,
  'url' => 'buscar/ubicacion',
  'query' => $query,
  'description' => 'resultados encontrados por su ubicacion',
))?>