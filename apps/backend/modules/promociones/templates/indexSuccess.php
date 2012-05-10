<h1>Promociones</h1>

<table>
  <thead>
    <tr>
      <th>Titulo</th>
      <th>Descripcion</th>
      <th>Numero</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cupon_list as $cupon): ?>
    <tr>
      <td><a href="<?php echo url_for('promociones/edit?id='.$cupon->getId()) ?>"><?php echo $cupon->getTitulo() ?></a></td>
      <td><?php echo $cupon->getDescripcion() ?></td>
      <td><?php echo $cupon->getNumero() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('promociones/new') ?>">Nueva</a>

  <br />
  
  <a href="<?php echo url_for('promociones/codigo')?>">Ver Codigos de Verificación</a>