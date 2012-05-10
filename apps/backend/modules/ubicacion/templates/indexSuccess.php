<h1>Ubicación</h1>

<table>
  <thead>
    <tr>
      <th>Empresa</th>
      <th>Calle</th>
      <th>Numero</th>
      <th>Colonia</th>
      <th>Codigo postal</th>
      <th>Delegacion</th>
      <th>Estado</th>
      <th>Altitud</th>
      <th>Longitud</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="<?php echo url_for('ubicacion/edit?empresa_id='.$ubicacion->getEmpresaId()) ?>">Editar</a></td>
      <td><?php echo $ubicacion->getCalle() ?></td>
      <td><?php echo $ubicacion->getNumero() ?></td>
      <td><?php echo $ubicacion->getColonia() ?></td>
      <td><?php echo $ubicacion->getCodigoPostal() ?></td>
      <td><?php echo $ubicacion->getDelegacion() ?></td>
      <td><?php echo $ubicacion->getEstado() ?></td>
      <td><?php echo $ubicacion->getLatitud() ?></td>
      <td><?php echo $ubicacion->getLongitud() ?></td>
    </tr>
  </tbody>
</table>

