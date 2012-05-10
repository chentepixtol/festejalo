<?php slot('title', sfConfig::get('app_page_title') . " - " . $categoria)?>
<?php slot('description',"Lista de empresas indexadas en la categoria de " . $categoria)?>
<?php slot('pagetitle',$categoria)?>

<ul>
  <?php foreach($pager->getResults() as $emp_cat): ?>
    <li>
      <p><a href="<?php echo url_for('show_empresa',$emp_cat->getEmpresa())?>">
        <?php echo $emp_cat->getEmpresa()->getNombre()?>
      </a></p>
      <p><?php echo $emp_cat->getEmpresa()->getDescripcion()?></p>
    </li>
  <?php endforeach;?>
</ul>

<?php include_partial('global/pager_route',array(
  'pager' => $pager,
  'route' => 'ver_empresas_por_categoria',
  'model_object' => $categoria,
  'description' => 'empresas indexadas en esta categoria.'
))?>