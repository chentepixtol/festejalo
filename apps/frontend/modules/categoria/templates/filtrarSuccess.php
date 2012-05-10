<?php slot('title', sfConfig::get('app_page_title') . " - Busqueda ")?>
<?php slot('description',"Lista de empresas indexadas en la busqueda.")?>
<?php slot('pagetitle')?>

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

<?php include_partial('global/pager_simple',array(
  'pager' => $pager,
  'url' => 'categoria/filtrar',
  'description' => 'Empresas indexadas en su busqueda.'
))?>
  