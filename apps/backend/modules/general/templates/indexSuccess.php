<h1>Información General</h1>

<table>
  <thead>
    <tr>
      <th>Empresa</th>
      <th>Telefono</th>
      <th>Fax</th>
      <th>Sitio web</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="<?php echo url_for('general/edit?empresa_id='.$general->getEmpresaId()) ?>">Editar</a></td>
      <td><?php echo $general->getTelefono() ?></td>
      <td><?php echo $general->getFax() ?></td>
      <td><?php echo $general->getSitioWeb() ?></td>
      <td><?php echo $general->getEmail() ?></td>
    </tr>
   
  </tbody>
</table>
