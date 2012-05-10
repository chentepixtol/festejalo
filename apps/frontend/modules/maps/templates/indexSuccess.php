<?php slot('pagetitle',"Ubicaciones")?>

<table>
  <thead>
    <tr>
      <th>Empresa</th>
      <th>Calle</th>
      <th>Colonia</th>
      <th>Codigo postal</th>
      <th>Delegacion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $ubicacion): ?>
    <tr>
      <td><a href="<?php echo url_for('maps',$ubicacion->getEmpresa()) ?>"><?php echo $ubicacion->getEmpresa() ?></a></td>
      <td><?php echo $ubicacion->getCalle() ?></td>
      <td><?php echo $ubicacion->getColonia() ?></td>
      <td><?php echo $ubicacion->getCodigoPostal() ?></td>
      <td><?php echo $ubicacion->getDelegacion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include_partial('global/pager_simple',array(
  'pager'=> $pager,
  'url' => "maps/index",
  'description' => 'ubicaciones indexadas', 
))?>