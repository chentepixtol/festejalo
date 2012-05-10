<?php slot('title', sfConfig::get('app_page_title') . " - " . $segmento)?>
<?php slot('description',"Lista de empresas indexadas en la categoria de " . $segmento)?>
<?php slot('pagetitle',$segmento)?>

<ul>
  <?php foreach($pager->getResults() as $emp_cat): ?>
    <li>
      <p><a href="<?php echo url_for('show_empresa', $emp_cat->getEmpresa())?>">
        <?php echo $emp_cat->getEmpresa()->getNombre()?>
      </a></p>
      <p><?php echo $emp_cat->getEmpresa()->getDescripcion()?></p>
    </li>
  <?php endforeach;?>
</ul>

<?php include_partial('global/pager_route',array(
  'pager' => $pager,
  'route' => 'ver_empresas_por_segmento',
  'model_object' => $segmento,
  'description' => 'empresas indexadas en este Segmento.'
))?>
