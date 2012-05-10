<h1>MicroSitio</h1>

<table>
  <thead>
    <tr>
      <th>Empresa</th>
      <th>Quienes somos</th>
      <th>Mision</th>
      <th>Vision</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="<?php echo url_for('sitio/edit?empresa_id='.$micrositio->getEmpresaId()) ?>">Editar</a></td>
      <td><?php echo $micrositio->getQuienesSomos() ?></td>
      <td><?php echo $micrositio->getMision() ?></td>
      <td><?php echo $micrositio->getVision() ?></td>
    </tr>
  </tbody>
</table>

